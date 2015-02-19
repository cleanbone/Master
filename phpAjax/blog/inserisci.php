<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require("config.php");
require("funzioni.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
  <title><?php echo $TITOLO ?></title>
  <link rel="stylesheet" type="text/css" href="stile.php" />
</head>
<body>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") { // la pagina e' stata chiamata con il GET
?>
  <h1>Invia un post</h1>
  <?php $user = dbLastUserPost(); ?>
  <form method="post" <?php echo "action=\"", $_SERVER["PHP_SELF"], "\""; ?> >
      <!-- (* \label{line:PHP_blog-inizio-post} *)  -->
      Username: <input type="text" name="utente" size="10" value="<?php echo $user['utente']; ?>"/>
      Password: <input type="password" name="password" size="10"/>
      <br/>
      <hr/>
      Titolo: <input type="text" name="titolo" size="50"/>
      <br/>
      Contenuto: <br/>
      <textarea name="contenuto" rows="10" cols="60"></textarea>
      <br/>
      <input type="submit" value="Pubblica"/>
  </form>
<?php
  }
  else{ // la pagina � stata chiamata con il POST
    //if (!utenteValido($_POST["utente"], $_POST["password"])) {
    $idu = dbUtenteValido($_POST["utente"], $_POST["password"]);
    if (!$idu) {

	//utente o password sono sbagliati
?>
  <h2>Errore</h2>
  <p>Non sei autorizzato all'inserimento. Torna al <a href="index.php">blog</a>.</p>
<?php
  } else {
    // altrimenti  salvo i dati
    //registra($_POST["titolo"], $_POST["contenuto"]);

      dbRegistra($_POST["titolo"], $_POST["contenuto"],$idu);
      echo "Il post e' stato pubblicato. Torna al <a href=\"index.php\">Blog</a>.</p>";
  }
}
?>
</body>
</html>
