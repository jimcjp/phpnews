<?php

    require_once "connsql.php";
    require_once "function.php";

    $boolean = add_user($_POST["un"],$_POST["pw"],$_POST["na"]);

    if($boolean)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

?>