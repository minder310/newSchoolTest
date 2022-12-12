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
    <?php include "./layouts/link_css.php";?>
    <!-- 導入bts資料也是用include資料導入，複製貼上(純粹增加印象。) -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- 這一段是導入css -->
</head>
<body>
    <?php
    include "./layouts/header.php";
    ?>
    
</body>
</html>