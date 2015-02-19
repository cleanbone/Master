<?php include_once('helpers/global.php'); ?>
<?php
  $db = new Db();
  $r = [];
  if(isset($_GET['m'])){
    $r = $db->select("SELECT * FROM film WHERE id=".$_GET['m']);
    $r = $r[0];
  } else {
   echo "404";
  }
?>
<h2><?php echo $r['titolo']; ?></h2>
<article>
  <p><?php echo $r['descrizione']; ?></p>
  <img src="../img/<?php echo $r['id']; ?>.jpg" alt="<?php echo ($r['titolo']); ?>" />
  <div class="clear"></div>
</article>
