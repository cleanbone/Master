<?php

function utenteValido($utente, $password) {
  global $UTENTE, $PASSWORD;
  return ($utente == $UTENTE && $password == $PASSWORD);
}

function rendiConforme($testo) {
  $testo = nl2br(htmlentities(stripslashes($testo)));
  $testo = str_replace("\r\n", "", $testo); // sistemi windows
  $testo = str_replace("\n", "", $testo); // sistemi unix
  $testo = str_replace("\r", "", $testo); // sistemi MacOS

  return $testo;
}

function registra($titolo, $testo) {
  global $BLOGFILE;
  $contenuto = file($BLOGFILE); // leggo il contenuto
  // creo il nuovo id
  $penultimo = explode("#", $contenuto[0]);
  $ultimo = $penultimo[0] + 1;
  $fp = fopen($BLOGFILE, "w"); // apro il file in scrittura

  // elimino eventuali caratteri di a capo e entit�
  // non conformi con HTML
  $titolo = rendiConforme($titolo);
  $testo = rendiConforme($testo);

  // compongo la riga da registrare contenente il nuovo post
  $post = $ultimo . "#" . date("Y-m-d, G:i")
    . "#" . $titolo . "#" . $testo . "\n";

  fwrite($fp, $post); // scrivo il post

  if (count($contenuto) > 0) { // se il blog contiene gi� qualcosa
    foreach ($contenuto as $post) {
      // riscrivo, di seguito, tutti i post precedenti
      fwrite($fp, $post);
    }
  }

  fclose($fp); // chiudo il file
}

function leggi($da, $quanti = NULL) {
  global $BLOGFILE;
  $risultato = array();
  $contenuto = file($BLOGFILE); // leggo il contenuto
  if (is_null($quanti))
    $quanti = count($contenuto);

  for ($i = $da; ($i - $da < $quanti) && ($i <= count($contenuto)); $i++) {
    // estraggo un post dal file e lo aggiungo all'array $risultato
    $post = explode("#", $contenuto[$i - 1]);  //(* \label{line:PHP_leggi-explode} *)
    $risultato[] = $post;
  }

  return $risultato;
}

function numeroPost() {
  global $BLOGFILE;
  $blog = file($BLOGFILE);

  // restituisco il numero di righe del file
  return count($blog);
}

function dbConnect() {
  $conn = mysql_connect("localhost", "amannara", "amannara")
    or die("Errore nella connessione al db: " . mysql_error());
  mysql_selectdb("dbamannara")
    or die("Errore nella selezione del db: " . mysql_error());
  return $conn;
}

function dbRegistra($titolo, $testo,$user) {
  $conn = dbConnect();
  $titolo = nl2br(htmlentities($titolo));
  $testo = nl2br(htmlentities($testo));
  $data = date("Y-m-d H:i:s");

  $sql = "INSERT INTO posts(data, titolo, testo, id_utente) VALUES('"
    . $data . "', '" . $titolo . "', '" . $testo . "', '". $user . "')";
  mysql_query($sql) or die("Errore nella query: "
    . $sql . "\n" . mysql_error());

  mysql_close($conn);
}

function dbLeggi($da, $quanti = NULL) {
  $conn = dbConnect();
  $risultato = array();

  $sql = "SELECT * FROM posts WHERE id >= " . $da;
  if (!is_null($quanti))
    $sql .= " AND id <= " . ($da + $quanti);
  $sql .= " ORDER BY data DESC";
  $risposta = mysql_query($sql) or die("Errore nella query: "
    . $sql . "\n" . mysql_error());

  while ($riga = mysql_fetch_row($risposta)) {
    $risultato[] = $riga;
  }
  mysql_close($conn);

  return $risultato;
}

function dbUtenteValido($utente, $password) {
  $conn = dbConnect();
  $sql = "SELECT * FROM utenti WHERE utente = '" . $utente . "'";
  $risposta = mysql_query($sql) or die("Errore nella query: "
    . $sql . "\n" . mysql_error());
  if (mysql_num_rows($risposta) == 0)
    return FALSE;
  $riga = mysql_fetch_array($risposta);
  mysql_close($conn);
  if(md5($password) == $riga['password'])
    return $riga['utente'];
  else return false;
}
function dbLastUserPost(){
  $c = dbConnect();
  $sql ="SELECT * FROM posts ORDER BY id DESC LIMIT 1";
  $r = mysql_query($sql) or die("Query Error:". mysql_error());
  if (mysql_num_rows($r) == 0)
    return FALSE;
  else{
    $p = mysql_fetch_array($r);
    $sql ="SELECT * FROM utenti WHERE utente ='".$p['id_utente']."'";
    $r = mysql_query($sql) or die("Query Error:". mysql_error());
    return mysql_fetch_array($r);
  }
}
function dbNumeroPost() {
  $conn = dbConnect();
  $sql = "SELECT MAX(id) as numero FROM posts";
  $risposta = mysql_query($sql) or die("Errore nella query: "
    . $sql . "\n" . mysql_error());
  $numero = mysql_fetch_row($risposta);
  mysql_close($conn);

  return $numero[0];
}

?>
