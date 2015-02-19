<?php
  require("config.php");
  require("funzioni.php");
  header("Content-type: text/xml");
  
  $conn = dbConnect();

  $sql = "SELECT * FROM posts ORDER BY data DESC";
  $risposta = mysql_query($sql) or die("Errore nella query: " 
    . $sql . "\n" . mysql_error());
  
  echo "<rss version=\"2.0\">\n",
    "<channel>\n",
    "<title>", $TITOLO, "</title>\n",
    "<link>", $URL, "</link>\n",
    "<description>Feed del blog ", $TITOLO, "</description>\n",
    "<language>IT-it</language>\n",
    "<generator>pwlsBlog</generator>\n";
  
  while ($riga = mysql_fetch_array($risposta)) {
    echo "<item>\n",
      "<title>", $riga["titolo"], "</title>\n",
      "<link>", $URL, "</link>\n",
      "<description>", $riga["testo"], "</description>\n",
      "<author>", $UTENTE, "</author>\n",
      "</item>\n";
  } 
  echo "</channel>\n</rss>\n";
  
  mysql_close($conn);
  
?>