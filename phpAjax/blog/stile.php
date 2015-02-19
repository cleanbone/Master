<?php
header("Content-type: text/css");
include("config.php");
?>

body {
  background-color: <?php echo $COLSFONDO; ?>;
  color: <?php echo $COLTESTO; ?>;
}
        
#intestazione  {
  color: <?php echo $COLSFONDO; ?>;
  background-color: <?php echo $COLINTESTAZIONE; ?>;
}
        
#menu {
  color: <?php echo $COLSFONDO; ?>;
  background-color: <?php echo $COLMENU; ?>;
  float: left;
  display: block;
  width: 100%;
}

#menu a {
  margin: 5px;
  color: <?php echo $COLSFONDO; ?>;
  font-weight: bold;
}
        
.post {
  border: thin dashed <?php echo $COLMENU; ?>;
  padding: 5px;
}
        
#blog {
  width: 600px;
}
