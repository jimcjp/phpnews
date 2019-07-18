<?php
/**/
require_once "connsql.php";
require_once "function.php";

$updatearticle = update_member($_POST["id"],$_POST["un"],$_POST["pw"],$_POST["na"]);

if($updatearticle){
 
    //echo yes 代表有存在;
   echo "yes";
  
}
else
{  
    echo "no";
}

?>