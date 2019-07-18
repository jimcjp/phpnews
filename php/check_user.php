<?php

    require_once "connsql.php";
    require_once "function.php";

    $boolean = check_user($_POST["username"]);

    if($boolean)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

?>