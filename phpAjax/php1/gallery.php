<!DOCTYPE html>
<?php include('inc/head.php'); ?>
<body class="bg-panna">
  <div class="container bg-azzurro">
    <?php include('inc/header.php'); ?>
    <div class="row main bg-verde">
      <?php include('inc/menu.php'); ?>
      <div class="content nine columns">
        <div id="gallery" class="row text-center gallery">
          <img class="mainimg" src="img/g/1.jpg" /><br />
          <a id="ext" href="img/g/1.jpg" target="_blank">Apri in un altra finestra</a>
        </div>
        <ul id="imglist" class="row imglist">
          <li id="pre" class="two columns command"><span class="button">Prec</span></li>
          <?php $files = scandir('img/g/min');
                foreach($files as $file) {
                  if($file == "." || $file == "..")
                    continue;
                  ?>
                  <li class="two columns img">
                    <img src="img/g/min/<?php echo $file; ?>" data-n="1"/>
                  </li>
                  <?php
                }
          ?>
          <li id="suc" class="two columns command"><span class="button">Succ</button></li>
        </ul>
      </div>
    </div>
    <footer class="bg-blus">

    </footer>
    <script type="text/javascript" src="js/script.js"></script>
  </div>
</body>
</html>
