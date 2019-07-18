<?php
@session_start();
require_once "php/connsql.php";
require_once "php/function.php";

$data = get_publish_work();
//print_r($data);

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
    <link href="image/sun2.png" rel="ShortCut Icon">
</head>

<body>
    <?php include_once "top.php"; ?>


    <div class="main">
        <div class="container">
            <div class="row">
                    <?php if (!empty($data)) { ?>
                        <?php foreach ($data as $value) { ?>
                            <?php $abstract = strip_tags($value["intro"]);
                            $abstract = mb_substr($abstract, 0, 50, "utf8"); ?>
                            <div class="card" style="width: 18rem;">
                                <?php if ($value["image_path"]) { ?>
                                    <a href="work.php?i=<?php echo $value["id"]; ?>"><img class="card-img-top" src="<?php echo $value["image_path"]; ?>" alt="Card image cap"></a>
                                <?php } else { ?>
                                    <a href="work.php?i=<?php echo $value["id"]; ?>"><video class="card-img-top" src="<?php echo $value["video_path"]; ?>" alt="Card image cap" controls></video></a>
                                <?php } ?>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $abstract; ?></p>

                                </div>
                            </div>
                        <?php }} ?>
            </div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>
</body>

</html>