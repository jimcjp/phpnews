<?php
$file_path = $_SERVER[ "PHP_SELF" ];
$file_name = basename( $file_path, ".php" );
switch ( $file_name ) {
    case "article_list":
        $page = 1;
        break;
    case "article":
        $page = 1;
        break;
    case "work_list":
        $page = 2;
        break;
    case "work":
        $page = 2;
        break;
    case "about_us":
        $page = 3;
        break;
    case "adminarticle_list":
        $page = 4;
        break;
    case "register":
        $page = 5;
        break;
    case "login":
        $page = 6;
        break;    
    default:
        $page = 0;
        break;
}
?>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">作品網站</h1>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==0)?" active ":" ";?>" href="index.php">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==1)?" active ":" ";?>" href="article_list.php">所有文章</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==2)?" active ":" ";?>" href="work_list.php">所有作品</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==3)?" active ":" ";?>" href="about_us.php">關於我們</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==4)?" active ":" ";?>" href="admin/index.php">後台首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==5)?" active ":" ";?>" href="register.php">註冊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==6)?" active ":" ";?>" href="admin/login.php">登入</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>