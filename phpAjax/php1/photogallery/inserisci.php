<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>.: pwlsGallery inserisci :.</title>
</head>
<body>
<?php
  require_once("config.php");
  require_once("funzioni.php");
  
  if (!isset($_FILES["nomefile"]))
    die("File non ricevuto\n");
  
  $tmp_nome = $_FILES["nomefile"]["tmp_name"];
  $tipo = $_FILES["nomefile"]["type"];
  $nome = $_FILES["nomefile"]["name"];
  
  if (!controllaTipo($tipo))
    die("File di tipo sconosciuto\n");
    
  if (move_uploaded_file($tmp_nome, DIR_IMMAGINI . "/" . $nome))
    echo "<p>Inserimento immagine effettuato, torna all'<a href=\"index.php\">indice</a></p>\n";
  else
    echo "<p>Non sono riuscito a spostare il file, controlla i permessi sul server</p>\n";
?>
</body>
</html>