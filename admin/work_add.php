<?php
require_once "../php/connsql.php";
//require_once "../php/function.php";
//print_r ($_SESSION);
if (!isset($_SESSION["is_login"]) || !$_SESSION["is_login"]) {
    header("location: login.php");
}

?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="Description" content="作品網站練習用">
    <meta name="keywords" content="html,css">
    <title>後台_新增作品</title>
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
                    <form id="work">
                        <div class="form-group">
                            <label for="intro">簡介</label>
                            <textarea id="intro" style="width:100%" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            圖片上傳<br>
                            <input type="file" id="image" accept="image/*">
                            <input type="hidden" id="image_path" value="">
                            <div id="show_image"></div>
                            <a href="javascript:void(0);" class="del_image btn btn-outline-danger">刪除</a>
                        </div>
                        <div class="form-group">
                            影片上傳<br>
                            <input type="file" id="video" accept="video/*">
                            <input type="hidden" id="video_path" value="">
                            <div id="show_video"></div>
                            <a href="javascript:void(0);" class="del_video btn btn-outline-danger">刪除</a>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="publish" id="Radios1" value="0" checked>
                            <label for="Radios1">
                                未發佈&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            <input type="radio" name="publish" id="Radios2" value="1">
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
        $(function() {

            //圖片自動上傳
            $("#image").on("change", function() {
                console.log($(this)[0].files[0]);
                var file_data = $(this)[0].files[0], //取的檔案名稱和資訊
                    save_path = "file/image/",
                    form_data = new FormData();

                form_data.append("file", file_data);
                form_data.append("save", save_path);

                $.ajax({
                    type: "post",
                    url: "../php/upload_file.php",
                    data: form_data,
                    datatype: "html",
                    cache: false, //因為只有上傳檔案,所以不要暫存
                    processData: false, //因為只有上傳檔案,所已佈要處理表單資訊
                    contentType: false //送過去內容,由 FormData 產生了,所以設定false
                }).done(function(data) {
                    //console.log(data);
                    if (data == "yes") {
                        //顯示圖片
                        $("#show_image").html("<img src='../" + save_path + file_data["name"] + "'>");
                        //save_path 資料夾路徑
                        //file_data["name"] 檔案名稱
                        $("#image_path").val(save_path + file_data["name"]);
                    }
                }).fail(function(jqxhr, textstatus, errorthrown) {
                    alert("有錯誤產生,請看console.log");
                    console.log(jqxhr, Responsetext);
                })
            })

            //刪除圖片
            $("a.del_image").on("click", function() {

                $.ajax({
                    type: "post",
                    url: "../php/del_file.php",
                    data: {
                        file: $("#image_path").val()
                    },
                    datatype: "html",
                }).done(function(data) {
                    //console.log(data);
                    if (data == "yes") {
                        //顯示圖片
                        $("#show_image").html("");
                        //save_path 資料夾路徑
                        //file_data["name"] 檔案名稱
                        $("#image_path").val("");
                        $("#image").val("");
                    }
                }).fail(function(jqxhr, textstatus, errorthrown) {
                    alert("有錯誤產生,請看console.log");
                    console.log(jqxhr, Responsetext);
                })
            })


            //影片自動上傳
            $("#video").on("change", function() {
                console.log($(this)[0].files[0]);
                var file_data = $(this)[0].files[0], //取的檔案名稱和資訊
                    save_path = "file/video/",
                    form_data = new FormData();

                form_data.append("file", file_data);
                form_data.append("save", save_path);

                $.ajax({
                    type: "post",
                    url: "../php/upload_file.php",
                    data: form_data,
                    datatype: "html",
                    cache: false, //因為只有上傳檔案,所以不要暫存
                    processData: false, //因為只有上傳檔案,所已佈要處理表單資訊
                    contentType: false //送過去內容,由 FormData 產生了,所以設定false
                }).done(function(data) {
                    //console.log(data);
                    if (data == "yes") {
                        //顯示圖片
                        $("#show_video").html("<video src='../" + save_path + file_data["name"] + "'controls>");
                        //save_path 資料夾路徑
                        //file_data["name"] 檔案名稱
                        $("#video_path").val(save_path + file_data["name"]);
                    }
                }).fail(function(jqxhr, textstatus, errorthrown) {
                    alert("有錯誤產生,請看console.log");
                    console.log(jqxhr, Responsetext);
                })
            })


            //刪除影片
            $("a.del_video").on("click", function() {

                $.ajax({
                    type: "post",
                    url: "../php/del_file.php",
                    data: {
                        file: $("#video_path").val()
                    },
                    datatype: "html",
                }).done(function(data) {
                    //console.log(data);
                    if (data == "yes") {
                        //顯示圖片
                        $("#show_video").html("");
                        //save_path 資料夾路徑
                        //file_data["name"] 檔案名稱
                        $("#video_path").val("");
                        $("#video").val("");
                    }
                }).fail(function(jqxhr, textstatus, errorthrown) {
                    alert("有錯誤產生,請看console.log");
                    console.log(jqxhr, Responsetext);
                })
            })


            //發佈
            $("#work").on("submit", function() {

                $.ajax({
                    type: "post",
                    url: "../php/add_work.php",
                    data: {
                        intro: $("#intro").val(),
                        image_path: $("#image_path").val(),
                        video_path: $("#video_path").val(),
                        publish: $("input[name='publish']:checked").val()
                    },
                    dataType: "html"
                }).done(function(data) {
                    if (data == "yes") {
                        alert("發布作品成功");
                        window.location.href = "work_list.php";
                    } else {
                        alert("發布作品失敗");
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