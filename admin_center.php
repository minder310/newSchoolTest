<?php
include "./db/base.php";

// 要是沒有login狀態，直接打回index.php。
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理中心</title>
    <?php include "./layouts/link_css.php";?>
    <link rel="stylesheet" href="./css/back.css">
</head>
<body>
    <?php
        include "./layouts/header.php";
    ?>
    <main class="container">
    <?php
    $do=$_GET['do']??'main';
    // 如果沒有do就輸出main。
    $file='./back/'.$do.".php";
    // 將背景資料夾，用do帶入來到相關網站。
    if(file_exists($file)){
        include $file;
    }else{
        include "./back/main.php";
    }
    ?>
    </main>
    <?php include "./layouts/scripts.php" ?>
</body>
</html>