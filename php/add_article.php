<?php

    require_once "connsql.php";
    require_once "function.php";

    $boolean = add_article($_POST["title"],$_POST["category"],$_POST["content"],$_POST["publish"]);

    if($boolean)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

?>