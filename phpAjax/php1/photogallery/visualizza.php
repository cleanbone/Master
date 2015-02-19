<?php 
	include_once("config.php");
	include_once("funzioni.php");
	if (!isset($_GET["immagine"]))
	  die("Errore: stai cercando di accedere alla pagina in modo scorretto\n");
	$immagine = $_GET["immagine"];
	$lista_file = caricaDirectory(DIR_IMMAGINI, $formati_immagine);
?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo "Immagine: " . $immagine; ?></title>
  </head>
  <body>

<?php
	echo "\t<img src=\"" . DIR_IMMAGINI . "/" . $lista_file[$immagine] . "\"/>\n";
?>
  	<table>
  		<tr>
<?php
	echo "\t\t\t";
	if ($immagine > 0)
	  echo "<td>" . generaLinkTestuale($immagine - 1, "Precedente") . "</td>";
	if ($immagine < count($lista_file) - 1)
	  echo "<td>" . generaLinkTestuale($immagine + 1, "Successiva") . "</td>";
?>
		</tr>
  	</table>
  </body>
</html>