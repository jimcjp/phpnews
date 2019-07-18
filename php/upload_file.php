<?php
/*print_r($_FILES);//上傳檔案的資訊,則需要透過 $_FILES 取得為二維陣列
echo "<hr>";
print_r($_POST);*/
//$_FILES["file"]["name"]：上傳檔案的原始名稱。
//$_FILES["file"]["type"]：上傳的檔案類型。
//$_FILES["file"]["size"]：上傳的檔案原始大小。
//$_FILES["file"]["tmp_name"]：上傳檔案後的暫存資料夾位置。
//$_FILES["file"]["error"]：如果檔案上傳有錯誤，可以顯示錯誤代碼。


//處理上傳的檔案 圖片
if(file_exists($_FILES["file"]["tmp_name"]))
{
  //上傳的資料夾
    $target_folder = $_POST["save"];
  //上傳的檔案名稱
    $file_name = $_FILES["file"]["name"];

    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../".$target_folder.$file_name))
    {
        echo "yes";
    }
    else
    {
        echo "no";
    }

}
else
{
    echo "暫存檔不存在 上傳失敗";
}

?>