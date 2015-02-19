
<?php 
require_once("config.php");
require_once("funzioni.php");
?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>.: PhotoGallery Indice delle fotografie :.</title>
  </head>
  <body>
     <h1>PhotoGallery: indice delle fotografie</h1>
<?php

$lista_file = caricaDirectory(DIR_IMMAGINI);

if (count($lista_file) > 0) {
  echo "<table>\n",
    "\t<tr>\n",
    "\t\t<td>", generaLinkImmagine(0, $lista_file[0]), "</td>\n";
  for ($i = 1; $i < count($lista_file); $i++) {
    if ($i % $immagini_per_riga == 0)
      echo "\t</tr>\n\t<tr>\n";
    echo "\t\t<td>", generaLinkImmagine($i, $lista_file[$i]), "</td>\n";
  }
  echo "\t</tr>\n";
  echo "</table>\n";
  
  echo "<p><a href=\"inserisci.html\">Inserisci una nuova immagine</a></p>";
  
} else 
  echo "\t<p>Nella cartella immagini non &egrave; presente alcuna immagine</p>\n";
?>
   	<hr/>

<?php
	include "pie_pagina.php";
?>
  </body>
</html>
