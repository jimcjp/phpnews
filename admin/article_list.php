<?php 
require_once "../php/connsql.php";
require_once "../php/function.php";
//print_r ($_SESSION);
if(!$_SESSION["is_login"]){
    header("location: login.php");
 }

$data = get_all_article();

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Description" content="作品網站練習用">
    <meta name="keywords" content="html,css">
    <title>後台_所有文章</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../image/sun2.png" rel="ShortCut Icon" >
</head>

<body>
    <?php include_once "top.php";?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <a href="article_add.php" class="btn btn-primary aal">新增文章</a>
                        <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                        <th scope="col">標題</th>
                        <th scope="col">分類</th>
                        <th scope="col">是否發佈</th>
                        <th scope="col">建立時間</th>
                        <th scope="col">管理動作</th>
                        </tr>
                        </thead>
                        <?php if(!empty($data)){?>
                        <?php foreach($data as $value){?>
                        <tbody>
                          <tr>
                            <td><?php echo $value["title"];?></td>
                            <td><?php echo $value["category"];?></td>
                            <td><?php echo ($value["publish"] == 0)?"未發佈":"發佈中";?></td>
                            <td><?php echo $value["create_date"];?></td>
                            <td>
                                <a href="article_edit.php?i=<?php echo $value["id"];?>" class="btn btn-warning">編輯</a>
                                <a href="javascript:void(0);" class="del_article btn btn-danger" data-id = "<?php echo $value["id"];?>">刪除</a>
                            </td>
                            <?php }}else{?>
                            <td colspan = "5">無資料</td>                             
                            <?php }?>
                            </tr>                                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php include_once "footer.php";?>

 <script>
     $(function(){
        $("a.del_article").on("click",function(){
            var c = confirm('你確定要刪除嗎');

            del_tr = $(this).parent().parent();

            if(c){
            $.ajax({
                        type: "post",
                        url: "../php/del_article.php",
                        data: {
                            id: $(this).attr("data-id")                          
                        },
                        dataType: "html"
                    }).done(function(data) {
                        if (data == "yes") {
                            alert("刪除文章成功");
                            del_tr.fadeOut();                            
                        } else {
                            alert("刪除文章失敗");
                            console.log(data);
                        }

                    }).fail(function(jqxhr, textstatus, errorthrown) {
                        alert("有錯誤產生,請看console.log");
                        console.log(jqxhr, Responsetext);
                    })

                return false;

                    }

        })

     })
 
 </script>
</body>
</html>