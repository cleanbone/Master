<?php
  if(isset($_GET)){
    $res = false;
    $pattern = "/ /";
    switch($_GET['type']){
      case 'email': $pattern = "/([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/";
                    break;
      case 'text': $pattern = "/[^|+(--)=<>(!=)\)\(%@#\*]{2}/";
                    break;
      default: $patter="/[^|+(--)=<>(!=)\)\(%@#\*]{0}/";
    }
    $res = preg_match($pattern,$_GET['value']);
    if(!$res){
      echo '<span class="error">Il campo '. $_GET['name'] . ' non è valido';
    }
  }
  if(isset($_POST)){

  }
?>
