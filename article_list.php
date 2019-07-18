<?php
@session_start();
require_once "php/connsql.php";
require_once "php/function.php";

$data = get_publish_article();

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
                <table class="table border border-primary">
                    <?php if(!empty($data)){?>
                    <?php foreach($data as $value){?>
                    <?php $abstract = strip_tags($value["content"]);
                          $abstract = mb_substr($abstract,0,200,"utf8");?>        
                    <thead>
                        <tr class="bg-primary">
                        <th><a href="article.php?i=<?php echo $value["id"];?>" id="font"><?php echo $value["title"];?></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php echo $abstract."....more";?></td>
                        </tr>
                    </tbody>
                    <?php }}?>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php include_once "footer.php";?>
</body>
</html>