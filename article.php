<?php
@session_start();
require_once "php/connsql.php";
require_once "php/function.php";

$data = get_article($_GET["i"]);

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Description" content="作品網站練習用">
    <meta name="keywords" content="html,css">
    <title>作品網站</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="image/sun2.png" rel="ShortCut Icon" >
</head>

<body>
    <?php include_once "top.php";?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card border-primary mb-3" style="max-width: 100%;">
                    <div class="card-header"><h2><?php echo $data["title"];?></h2></div>
                        <div class="card-body text-dark">
                            <p><?php echo $data["content"];?></p>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
 <?php include_once "footer.php";?>
</body>
</html>