<?php
$file_path = $_SERVER[ "PHP_SELF" ];
$file_name = basename( $file_path, ".php" );
switch ( $file_name ) {
    case "article_list":
    case "article_edit":
    case "article_add":
        $page = 1;
        break;
    case "work_list":
    case "work_edit":
    case "work_add":
        $page = 2;
        break;
    case "member_list":
    case "member_edit":
    case "member_add":
        $page = 3;
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
                        <a class="nav-link" href="../">前台首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==0)?" active ":" ";?>" href="index.php">後台首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==1)?" active ":" ";?>" href="article_list.php">所有文章</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==2)?" active ":" ";?>" href="work_list.php">所有作品</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page==3)?" active ":" ";?>" href="member_list.php">所有會員</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">登出</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>