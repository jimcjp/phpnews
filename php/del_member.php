<?php
/**/
require_once "connsql.php";
require_once "function.php";

$addarticle = del_member($_POST["id"]);

if($addarticle){
 
    //echo yes 代表有存在;
   echo "yes";
  
}
else
{  
    echo "no";
}

?>