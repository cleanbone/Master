<?php include_once('helpers/global.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fantozzi's Movies</title>
  <meta name="description" content="fanpage of Fantozzi saga">
  <meta name="author" content="Andrea Mannarà 'huvber@gmail.com'">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body class="bg-panna">
  <div class="container bg-azzurro">
    <?php r("inc/header"); ?>
    <div class="row main bg-verde">
      <?php r("inc/menu"); ?>
      <div class="content nine columns">
        <?php r(isset($_GET['content'] )? $_GET['content'] : "pages/main"); ?>
      </div>
    </div>
    <?php r("inc/footer"); ?>
    <script type="text/javascript" src="js/script.js"></script>
  </div>
</body>
</html>
