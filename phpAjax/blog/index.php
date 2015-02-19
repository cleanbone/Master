<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<?php
require("config.php");
require("funzioni.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
  <title><?php echo $TITOLO; ?></title>
  <link rel="stylesheet" type="text/css" href="stile.php" />
</head>
<body>
  <div id="intestazione">
    <h1><?php echo $TITOLO; ?></h1>
    <h2>di <?php echo $UTENTE; ?></h2>
    <div id="menu">
      <a href="index.php">Home</a>
      <a href="inserisci.php">Inserisci</a>
      <a href="archivio.php">Archivio</a>
    </div>
  </div>
  <div id="blog">
<?php

//$contenuto = leggi(1, 5); // (* \label{line:PHP_chiamata-leggi} *)
$contenuto = dbLeggi(1, 5);

if (count($contenuto) > 0) {
  foreach ($contenuto as $post) {
    echo "<div class=\"post\">\n<h3>", $post[2], "</h3>\n";
    echo "<p>", $post[3], "</p>\n";
    echo "<p class=\"info\">Pubblicato il: ", $post[1],
      " da ", $UTENTE, "</p>\n</div>\n";
  }
}
?>
  </div>
  <hr/>
</body>
</html>