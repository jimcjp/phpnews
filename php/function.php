<?php
@session_start();

function get_publish_article()
{
    $data = array();

    //$data[] = null;

    $sql = "select * from article where publish = 1";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) > 0 )
        {
            while($result = mysqli_fetch_assoc($row))
            {

                $data[] = $result;
            }
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $data;

}


function get_article($id)
{
    $result = null;

    $sql = "select * from article where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) > 0 )
        {
            $result = mysqli_fetch_assoc($row);
     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}


function get_publish_work()
{
    $data = array();

    //$data[] = null;

    $sql = "select * from works where publish = 1";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) > 0 )
        {
            while($result = mysqli_fetch_assoc($row))
            {

                $data[] = $result;
            }
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $data;

}


function get_work($id)
{
    $result = null;

    $sql = "select * from works where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) > 0 )
        {
            $result = mysqli_fetch_assoc($row);
     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}


function check_user($username)
{
    $result = null;

    $sql = "select * from user where username = '{$username}'";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function add_user($username,$password,$name)
{
    $result = null;

    $password = md5($password);

    $sql = "insert into user(username,password,name) value(
            '{$username}',
            '{$password}',
            '{$name}')";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function login_user($username,$password)
{
    $_SESSION["is_login"] = null ;

    $result = null;

    $password = md5($password);

    $sql = "select * from user where username = '{$username}' and 
            password = '{$password}'";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) == 1 )
        {
            $user = mysqli_fetch_assoc($row);
            $_SESSION["login_user_id"]  = $user["id"];
            $_SESSION["is_login"] = true;
            $result = true;  
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function get_all_article()
{
    $data = array();

    //$data[] = null;

    $sql = "select * from article";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) > 0 )
        {
            while($result = mysqli_fetch_assoc($row))
            {

                $data[] = $result;
            }
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $data;

}


function add_article($title,$category,$content,$publish)
{
    $result = null;

    $create_date = date("Y-m-d h:i:s");

    $create_id = $_SESSION["login_user_id"];

    $sql = "insert into article(title,category,content,publish,create_date,create_id) value(
            '{$title}',
            '{$category}',
            '{$content}',
             {$publish},
            '{$create_date}',
             {$create_id})";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}


function del_article($id)
{
    $result = null;

    $sql = "delete from article where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function get_edit_article($id)
{
    $result = null;

    $sql = "select * from article where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) == 1 )
        {
            $result = mysqli_fetch_assoc($row);
     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}


function update_article($id,$title,$category,$content,$publish)
{
    $result = null;

    $modify_date = date("Y-m-d h:i:s");

    $sql = "update article set        
            title = '{$title}',
            category = '{$category}',
            content = '{$content}',
            publish = '{$publish}',
            modify_date = '{$modify_date}'
            where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}


function get_all_work()
{
    $data = array();

    //$data[] = null;

    $sql = "select * from works";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) > 0 )
        {
            while($result = mysqli_fetch_assoc($row))
            {

                $data[] = $result;
            }
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $data;

}



function get_edit_work($id)
{
    $result = null;

    $sql = "select * from works where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_num_rows($row) == 1 )
        {
            $result = mysqli_fetch_assoc($row);
     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function del_work($id)
{

    $result = null;

    $work = get_edit_work($id);

    if(file_exists("../".$work['image_path']))
    {    
        unlink("../".$work['image_path']);
    }

    if(file_exists("../".$work['video_path']))
    {     
        unlink("../".$work['video_path']);
    }

    $sql = "delete from works
            where id = {$id}";
       
    $row = mysqli_query($_SESSION["link"],$sql);
    
    if($row)//驗證是否執行成功
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1)
        {       
            $result = true;           
        }     
    }
    else
    {
        echo "{$sql}語法執行失敗.<br/>".mysqli_error($_SESSION["link"]);       
    }
    return $result;
}



function add_work($intro,$image_path,$video_path,$publish)
{
    $result = null;

    $upload_date = date("Y-m-d h:i:s");

    $create_user_id = $_SESSION["login_user_id"];

    $image_path_val = "'{$image_path}'" ;
    if($image_path == ""){
        $image_path_val = "null";
    }

    $video_path_val = "'{$video_path}'" ;
    if($video_path == ""){
        $video_path_val = "null";
    }

    $sql = "insert into works(intro,image_path,video_path,publish,upload_date,create_user_id) value(
            '{$intro}',
             {$image_path_val},
             {$video_path_val },
             {$publish},
            '{$upload_date}',
             {$create_user_id})";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function update_work($id,$intro,$image_path,$video_path,$publish)
{
    $result = null;

    $work = get_edit_work($id);

    if(file_exists("../".$work["image_path"]))
    {     
        if($image_path != $work["image_path"])
        {
        unlink("../".$work["image_path"]);
        }
    }

    if(file_exists("../".$work["video_path"]))
    {     
        if($video_path != $work["video_path"])
        {
        unlink("../".$work["video_path"]);
        }
    }

    $image_path_sql = "image_path = '{$image_path}',";
    if($image_path == ""){
        $image_path_sql = "image_path = null,";
    }

    $video_path_sql = "video_path = '{$video_path}',";
    if($video_path == ""){
        $video_path_sql = "video_path = null,";
    }

    $sql = "update works set 
            intro = '{$intro}',
            {$image_path_sql}
            {$video_path_sql}
            publish = {$publish}
            where id = {$id}";

    $row = mysqli_query($_SESSION["link"],$sql);

    if($row)
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1 )
        {
            $result = true;     
        }
    }
    else
    {
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
    }

    return $result;

}



function get_all_user(){

    $datas = array();
    
    $sql = "select * from `user`";
    //echo $sql;
    $row = mysqli_query($_SESSION["link"],$sql);
    
    
    if($row)
    {
        //執行成功
        if(mysqli_num_rows($row)> 0)
        {
            while($result = mysqli_fetch_assoc($row))
            {
            
            $datas [] = $result;
                
            }            
        }
    }
    else{
        
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
        
    }
    
    return $datas;    
}


function del_member($id)
{

    $result = null;

    $sql = "delete from user
            where id = {$id}";
       
    $row = mysqli_query($_SESSION["link"],$sql);
    
    if($row)//驗證是否執行成功
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1)
        {       
            $result = true;           
        }     
    }
    else
    {
        echo "{$sql}語法執行失敗.<br/>".mysqli_error($_SESSION["link"]);       
    }
    return $result;
}


function get_edit_member($id)
{

    $result = null;
    
    $sql = "select * from user where id = {$id}";
    
    $row = mysqli_query($_SESSION["link"],$sql);
    
    if($row)
    {
        if(mysqli_num_rows($row) == 1)
        {
          $result = mysqli_fetch_assoc($row);
           
        }
    }
    else{
        
        echo "{$sql}語法執行失敗".mysqli_error($_SESSION["link"]);
        
    }
 
    return $result;
    
}


function update_member($id,$username,$password,$name)
{

    $result = null;

    $password_sql = "";

    if($password != "")
    {
     $password = md5($password);
     
     $password_sql = "password = '{$password}',";
    }

    $sql = "update user set username = '{$username}',
            {$password_sql}
            name = '{$name}'
            where id = {$id}";
       
    $row = mysqli_query($_SESSION["link"],$sql);
    
    if($row)//驗證是否執行成功
    {
        if(mysqli_affected_rows($_SESSION["link"]) == 1)
        {       
            $result = true;           
        }     
    }
    else
    {
        echo "{$sql}語法執行失敗.<br/>".mysqli_error($_SESSION["link"]);       
    }
    return $result;
}
?>