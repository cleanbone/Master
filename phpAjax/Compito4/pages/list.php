<?php include_once('helpers/global.php'); ?>
<h2>Movies List</h2>
<ul class="list">
  <?php $db = new Db();
  $l = $db->select("SELECT * FROM film");
  foreach($l as $m){
    if($m['id']){
    ?><li class="row">
        <div class="two columns"><?php echo $m['anno']; ?></div>
        <div class="five columns">
          <a href="<?php echo clink('pages/movie'); ?>&m=<?php echo $m['id']; ?>">
            <?php echo $m['titolo']; ?>
          </a>
        </div>
        <div class="five columns">
          <img src="./img/mov/<?php echo $m['id']; ?>.jpg" alt="<?php echo $m['titolo']; ?>" />
        </div>
    </li><?php
  } } ?>
</ul>
