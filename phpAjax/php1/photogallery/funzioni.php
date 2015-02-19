<?php
require_once("config.php");

// funzione che effettua il caricamento dei file presenti nella directory $dir, che soddifano l'espressione regolare $formati
function caricaDirectory($dir) {
  $dh = opendir($dir) or die("Errore nell'apertura della directory ". $dir);
  $contenuto = array();
  while (($file = readdir($dh)) != FALSE)
    if (!is_dir($file) && controllaFormato($file))
      $contenuto[] = $file;
  closedir($dh);
  return $contenuto;
}

// funzione che genera un link verso l'immagine con indice $indice_immagine e testo specificato in $testo_link
function generaLinkImmagine($indice_immagine, $file) {
  return "<a href=\"visualizza.php?immagine=" 
    . $indice_immagine . "\">" 
    . "<img src=\"" . DIR_IMMAGINI . "/" 
    . $file . "\" width=\"80\" height = \"60\"/>"
    . "</a>";
}

function generaLinkTestuale($indice_immagine, $testo = "") {
 return "<a href=\"visualizza.php?immagine=" 
    . $indice_immagine . "\">" 
    . $testo 
    . "</a>";
}

function controllaFormato($nomefile) {
  global $formati_immagine;
  foreach ($formati_immagine as $formato) 
    if (strrpos($nomefile, $formato))
      return TRUE;
  return FALSE; // nessun formato trovato
}

function controllaTipo($tipo) {
  global $tipi_immagine;
  foreach ($tipi_immagine as $formato){ 
  	if ((strcmp($tipo, $formato)==0))
      return TRUE;
  	return FALSE; // nessun tipo trovato
  }
}
?>