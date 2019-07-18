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

    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="mx-auto">


                    <form id="register_form">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-md-3 col-form-label">帳號</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" class="form-control" id="username" placeholder="帳號" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-md-3 col-form-label">密碼</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="password" class="form-control" id="password" placeholder="密碼" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmpassword" class="col-sm-2 col-md-3 col-form-label">確認密碼</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="password" class="form-control" id="confirmpassword" placeholder="確認密碼" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-md-3 col-form-label">暱稱</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" class="form-control" id="name" placeholder="暱稱" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10 col-md-6">
                                <button type="submit" class="btn btn-primary">確認送出</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include_once "footer.php"; ?>

    <script>
        $(function() {

            /**--> */
            $("#username").on("keyup", function() {
                if ($(this).val() != "") {
                    $.ajax({
                        type: "post",
                        url: "php/check_user.php",
                        data: {
                            username: $(this).val()
                        },
                        dataType: "html"
                    }).done(function(data) {
                        if (data == "yes") {
                            alert("此帳號已被使用");
                            $("#register_form button[type='submit']").attr("disabled", true);
                        } else {
                            $("#register_form button[type='submit']").attr("disabled", false);
                        }

                    }).fail(function(jqxhr, textstatus, errorthrown) {
                        alert("有錯誤產生,請看console.log");
                        console.log(jqxhr, Responsetext);
                    })

                }
                $("#register_form button[type=submit]").attr("disabled", false);
            })

            /**--> */
            $("#register_form").on("submit", function() {
                    if ($("#password").val() == $("#confirmpassword").val()) {
                        $.ajax({
                            type: "post",
                            url: "php/add_user.php",
                            data: {
                                'un': $("#username").val(),
                                'pw': $("#password").val(),
                                'na': $("#name").val()
                            },
                            dataType: "html"
                        }).done(function(data) {
                            if (data == "yes") {
                                alert("註冊成功");
                                window.location.href = "admin/index.php";
                            } else {
                                alert("註冊失敗");
                                console.log(data);
                            }

                        }).fail(function(jqxhr, textstatus, errorthrown) {
                            alert("有錯誤產生,請看console.log");
                            console.log(jqxhr, Responsetext);
                        })

                    } else {
                        alert("密碼不一致,請重新確認");
                        return false;
                    }
                return false;
            })



        })
    </script>



</body>

</html>