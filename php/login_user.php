<?php

    require_once "connsql.php";
    require_once "function.php";

    $boolean = login_user($_POST["un"],$_POST["pw"]);

    if($boolean)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

?>