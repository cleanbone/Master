<?php include_once('helpers/global.php'); ?>
<nav class="three columns bg-azzurro">
  <ul>
    <li class="nav-header open">
      <span  class="bg-blus">MENU</span>
      <ul class="submenu">
        <li><a href="<?php echo clink("pages/main"); ?>">HOME</a></li>
        <li><a href="<?php echo clink("pages/contribute"); ?>">CONTRIBUTE</a></li>
        <li><a href="<?php echo clink("pages/list"); ?>">STORYLINE</a></li>
        <li><a href="<?php echo clink("pages/gallery"); ?>">GALLERY</a></li>
      </ul>
    </li>
    <li class="nav-header close">
      <span class="close bg-blus">MOVIES LIST</span>
      <ul>
        <?php
          $db = new Db();
          $l = $db->select("SELECT * FROM film");
          foreach($l as $m){
            ?><li>
                <a href="<?php echo r('pages/movie'); ?>&m=<?php echo $m['id']; ?>">
                  <?php echo $m['titolo']; ?>
                </a>
            </li><?php
            } ?>
      </ul>
    </li>
  </ul>
  <div id="date" class="text-center"></div>
  <div id="browser" class="text-center"></div>
</nav>
