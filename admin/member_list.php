<?php
require_once "../php/connsql.php";
require_once "../php/function.php";
//print_r ($_SESSION);
if(!$_SESSION["is_login"]){
    header("location: login.php");
 }

$datas = get_all_user();
//print_r($datas);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Description" content="作品網站練習用">
    <meta name="keywords" content="html,css">
    <title>後台_所有會員</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../image/sun2.png" rel="ShortCut Icon" >
</head>

<body>
    <?php include_once "top.php";?>

    
    <div class="main" >
        <div class="container" >
            <div class="row">
                <div class="col-sm-12">
                <a href="member_add.php" class="btn btn-primary aal">新增會員</a>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                        <th scope="col">使用者id</th>
                        <th scope="col">帳號</th>
                        <th scope="col">暱稱</th>                        
                        <th scope="col">管理動作</th>
                        </tr>
                        </thead>
                        <?php if(!empty($datas)){?>
                        <?php foreach($datas as $value){?>

                        <tbody>
                        <tr>
                            <td><?php echo $value["id"];?></td>
                            <td><?php echo $value["username"];?></td>
                            <td><?php echo $value["name"];?></td>                            
                            <td>
                            <a href="member_edit.php?i=<?php echo $value["id"];?>" class="btn btn-warning">編輯</a>
                            <a href="javascript:void(0);" class="btn btn-danger del_member" data-id="<?php echo $value["id"];?>">刪除</a>
                            </td>
                        <?php }}else{?>

                            <td colspan = "4">無資料</td> 
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

			//是否要刪除
			$("a.del_member").on("click", function(){

                var x = confirm("你確定要刪除嗎?");
                    //console.log($(this).attr("data-id"));
                del_tr = $(this).parent().parent();

               if(x)
                {
                    $.ajax({
						type: "post", //與表單傳送方式一樣 有GET和POST
						url: "../php/del_member.php", //要連到的網頁
						data: { //為要傳過去的資料,使用物件方式呈現,因為變數key值是英文,所以用物件方式傳送。ex:{name:"輸入的名字",password:"輸入的密碼"}
							id: $(this).attr("data-id")
						},
						datatype: "html"
					})
					.done(function(data){					
						if(data == "yes")
						{
							alert("刪除成功");
                            del_tr.fadeOut();
							//$("#register_form button[type='submit']").addClass("disabled");//增加類別disabled
							//window.location.href = "article_list.php";
						}
						else
						{
							alert("刪除失敗");
						}
					})
					.fail(function(jqxhr,textstatus,errorthrown){
						alert("有錯誤產生,請看console.log");
						console.log(jqxhr,Responsetext);
					})
                }
                
                    
					 /* */	                
					//$("#register_form button[type='submit']").attr("disabled",false);				                
			})
		})
</script>
</body>
</html>