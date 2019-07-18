<?php
require_once "../php/connsql.php";
require_once "../php/function.php";
//print_r ($_SESSION);
if(!$_SESSION["is_login"]){
    header("location: login.php");
 }

$data = get_edit_article($_GET['i']);

?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="Description" content="作品網站練習用">
    <meta name="keywords" content="html,css">
    <title>後台_編輯文章</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../image/sun2.png" rel="ShortCut Icon">
</head>

<body>
    <?php include_once "top.php"; ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form id="article">
                        <div class="form-group">
                            <input type="hidden" id="id" value="<?php echo $data['id'];?>">
                            <label for="title">標題</label>
                            <input type="text" class="form-control" id="title" value="<?php echo $data['title']?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="category">分類</label>
                            <select id="category">
                                <option value="新聞" <?php echo ($data['category'] == '新聞')?'selected':'';?>>新聞</option>
                                <option value="心得" <?php echo ($data['category'] == '心得')?'selected':'';?>>心得</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="content">內容</label>
                        <textarea  id="content" style="width:100%" rows="10" required><?php echo $data['content'];?></textarea>        
                        </div>
                        <div class="form-check">
                            <input type="radio" name="publish" id="Radios1" value="0" <?php echo ($data['publish'] == 0)?'checked':'';?>>
                            <label for="Radios1">
                                未發佈&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            <input type="radio" name="publish" id="Radios2" value="1" <?php echo ($data['publish'] == 1)?'checked':'';?>>
                            <label for="Radios2">
                                發佈中
                            </label>
                        </div><br>
                        <button type="submit" class="btn btn-primary">確認送出</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>


    <script>
    
    $(function(){

        $("#article").on("submit",function(){

            $.ajax({
                        type: "post",
                        url: "../php/update_article.php",
                        data: {
                            id: $("#id").val(),
                            title: $("#title").val(),
                            category: $("#category").val(),
                            content: $("#content").val(),
                            publish: $("input[name='publish']:checked").val()
                        },
                        dataType: "html"
                    }).done(function(data) {
                        if (data == "yes") {
                            alert("更新文章成功");
                            window.location.href = "article_list.php";
                        } else {
                            alert("更新文章失敗");
                        }

                    }).fail(function(jqxhr, textstatus, errorthrown) {
                        alert("有錯誤產生,請看console.log");
                        console.log(jqxhr, Responsetext);
                    })

            return false;
        })
        
    })

    </script>  
</body>

</html>