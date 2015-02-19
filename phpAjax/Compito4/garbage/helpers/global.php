<?php
class Db{
  private $connection = null;
  private $host = "localhost";
  private $user = "amannara";
  private $pwd = "amannara";
  public _constructor($lh,$us,$p){
    $host = $lh;
    $user = $us;
    $pwd = $p;
  }
  private connect(){
    $connection = mysql_connect($host, $user, $pwd);
    return true && $connection;
  }
}
Class App{
  private $content = null;
  private $template = "template";
  private $vf = "/view//";
  private $route = "";
  private $type ="";
  private $controllers = [];
  public _constructor($get){
    $this->type = isset($get['type']) ? $get['type'] : "";
    $this->route = isset($get['route']) ? $get['route'] : "";
    $this->data = isset($get['data']) ? $get['data'] : "";
  }
  public subscribe($type,$controller){
    $this->controllers[$type] = $controller;
  }
  public run(){
    $ac = $this->controllers[$this->type];
    return $ac->run($this->route,$this->data);
    $this->r($template);
  }
  public function r($page){
    include($this->vf . $page . ".php");
  }
  public function r_content(){
    global $cont;
    if($cont->n_el > 1){
      include($this->vf . $cont->type . "/list.php");
    else
      include($this->vf . $cont->type . "/detail.php");
  }
  public function link($type,$route="",$data=""){
    return "index.php?type=".$type."&route=".$route."&data=".$data;
  }

}
?>
