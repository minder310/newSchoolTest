<?php
include "./db/base.php";
// session_start()取用資料庫寫法皆寫在include中(include等同複製貼上，將每個程式碼分開。)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <?php include "./layouts/link_css.php"; ?>
    <!-- 導入bts資料也是用include資料導入，複製貼上(純粹增加印象。) -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- 這一段是導入css -->
</head>

<body>
    <!-- 這段是heard拿來建立，選單用的。 -->
    <?php
    include "./layouts/header.php";
    ?>
    <main class="container">
        <?php

        // 這段的意思是如果$_GET['do']有值，則$do=$_GET['do']如果沒有，$do=main;
        $do = $_GET['do'] ?? 'main';
        /*原程式碼。以上是縮寫。 
        if(isset($_GET['do'])){
        $do=$_GET['do'];
        }else{
        $do='main';
        } */
        
        // 宣告檔案位置，將do檔塞入，我們要取用的資料夾，位置處。
        $file="./front/".$do.".php";
        // file_exists()指查詢資料夾，是否存在，如果存在就導入，如果不存在，就導入main.php。
        if(file_exists($file)){
            include $file;
        }else{
            include "front/main.php";
        }
        // all("students",["dept"=>2,"graduate_at"=>2]);
        // 表單名稱,取出列表。
        ?>

    </main>
    <!-- 導入js檔案。 -->
    <?php include "./layouts/scripts.php"?>
</body>

</html>