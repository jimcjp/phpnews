<?php
@session_start();

$db_host = "localhost";
$db_user = "root";
$db_pw = "1234";
$db_name = "tryfb";

$_SESSION["link"] = mysqli_connect($db_host,$db_user,$db_pw,$db_name);

if($_SESSION["link"]){

    mysqli_query($_SESSION["link"],"set names utf8");
    //echo "資料庫連接成功";

}else{

    echo "資料庫連接失敗".mysqli_connect_error();;
}


?>