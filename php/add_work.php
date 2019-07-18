<?php

    require_once "connsql.php";
    require_once "function.php";

    $boolean = add_work($_POST["intro"],$_POST["image_path"],$_POST["video_path"],$_POST["publish"]);

    if($boolean)
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

?>