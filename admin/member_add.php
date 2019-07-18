<?php
require_once "../php/connsql.php";
//require_once "../php/function.php";
//print_r ($_SESSION);
if(!$_SESSION["is_login"]){
   header("location: login.php");
}

//$datas = get_all_article();
//print_r($datas);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Description" content="作品網站練習用">
    <meta name="keywords" content="html,css">
    <title>後台_新增會員</title>
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
                <form id="register_form" >
						<div class="form-group ">
							<label for="username">帳號</label>
							<input type="text" class="form-control" id="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="password">密碼</label>
							<input type="password" class="form-control" id="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label for="confirmpassword">確認密碼</label>
							<input type="password" class="form-control" id="confirmpassword" placeholder="confirmpassword" required>
						</div>
						<div class="form-group">
							<label for="name">暱稱</label>
							<input type="text" class="form-control" id="name" placeholder="name" required>
						</div>

						<button type="submit" class="btn btn-primary">確認送出</button>
					</form>
                </div>
            </div>  
        </div>
    </div>
 <?php include_once "footer.php";?>



 <script>
		$(function() {

			//檢查帳號是否使用過
			$("#username").on("keyup", function(){
				if ($(this).val() != "")
				{
					$.ajax({
						type: "post", //與表單傳送方式一樣 有GET和POST
						url: "../php/check_user.php", //要連到的網頁
						data: { //為要傳過去的資料,使用物件方式呈現,因為變數key值是英文,所以用物件方式傳送。ex:{name:"輸入的名字",password:"輸入的密碼"}
						username: $(this).val()
						},
						datatype: "html"
					})
					.done(function(data){					
						if(data == "yes")
						{
							alert("此帳號已被使用");
							//$("#register_form button[type='submit']").addClass("disabled");//增加類別disabled
							$("#register_form button[type='submit']").attr("disabled",true);//增加屬性disabled
						}
						else
						{
							$("#register_form button[type='submit']").attr("disabled",false);
						}
					})
					.fail(function(jqxhr,textstatus,errorthrown){
						alert("有錯誤產生,請看console.log");
						console.log(jqxhr,Responsetext);
					})
				}
				else
				{
					$("#register_form button[type='submit']").attr("disabled",false);
				}
				
			})


			//檢查密碼輸入一樣
			$("#register_form").on("submit", function(){

				if ($("#password").val() != $("#confirmpassword").val())
				{ 
					alert("密碼錯誤");//密碼與確認密碼不一樣
					return false;
				}
				else
				{
					//密碼與確認密碼一樣 正確
					$.ajax({
						type: "post", //與表單傳送方式一樣 有GET和POST
						url: "../php/add_user.php", //要連到的網頁
						data: { //為要傳過去的資料,使用物件方式呈現,因為變數key值是英文,所以用物件方式傳送。ex:{name:"輸入的名字",password:"輸入的密碼"}
						    un: $("#username").val(),
							pw: $("#password").val(),
							na: $("#name").val()
						},
						datatype: "html"
					})
					.done(function(data){					
						if(data == "yes")
						{
							alert("新增成功");
							//$("#register_form button[type='submit']").addClass("disabled");//增加類別disabled
						//增加屬性disabled
						window.location.href = "member_list.php";
						}
						else
						{
							alert("新增失敗");
						}
					})
					.fail(function(jqxhr,textstatus,errorthrown){
						alert("有錯誤產生,請看console.log");
						console.log(jqxhr,Responsetext);
					})
				}
				
				return false;
			})
		})
	</script>


</body>
</html>