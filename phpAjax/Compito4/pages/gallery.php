<div id="gallery" class="row text-center gallery">
  <img class="mainimg" src="img/g/1.jpg" /><br />
  <a id="ext" href="img/g/1.jpg" target="_blank">Apri in un altra finestra</a>
</div>
<ul id="imglist" class="row imglist">
  <li id="pre" class="two columns command"><span class="button">Prec</span></li>
  <?php
  $files = scandir('img/g/min');
  $i =1;
  foreach($files as $file) {
    if($file == '.' || $file == '..') continue;
    ?><li class="two columns img">
      <img src="img/g/min/<?php echo $file; ?>" data-n="<?php echo $i; ?>"/>
    </li><?php
    $i++;
  }
  ?>
  <li id="suc" class="two columns command"><span class="button">Succ</button></li>
</ul>
</div>
