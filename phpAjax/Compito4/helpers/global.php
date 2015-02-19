<?php
class Db{
  private $connection = null;
  private $host = "localhost";
  private $user = "amannara";
  private $pwd = "amannara";
  private $db = "dbamannara";
  public function __constructor($lh="localhost",
                              $us="amannara",
                              $p="amannara",
                              $db="dbamannara"){
    $this->host = $lh;
    $this->user = $us;
    $this->pwd = $p;
    $this->db = $db;
  }
  private function connect(){
    $connection = mysql_connect($this->host, $this->user, $this->pwd);
    mysql_select_db($this->db);
    return (true && $connection);
  }
  private function disconnect(){
    mysql_close($connection);
  }
  public function select($query){
    $this->connect();
    $r = mysql_query($query);
    $f = [];
    switch(mysql_num_rows($r)){
      case 0: $f = false; break;
      case 1: $f[] = mysql_fetch_array($r); break;
      default: while($f[] = mysql_fetch_array($r));
    }
    $this->disconnect();
    return $f;
  }

}

function r($page){
    include("./" . $page . ".php");
}
function clink($link){
    return "index.php?content=$link";
}

$DB = new Db();

?>
