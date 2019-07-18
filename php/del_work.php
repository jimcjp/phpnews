<?php

    require_once "connsql.php";
    require_once "function.php";

    $boolean = del_work($_POST["id"]);

    if($boolean)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

?>