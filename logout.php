<?php

session_start();
// 許用餅乾。
unset($_SESSION['login']);
// unset是銷毀數值的意思讓他不存在。可以銷毀任何東西。
header("location:index.php");
// 這邊是返回首頁。
echo "這邊可以增加，跳回上一頁的頁面，讓他不用再找上個頁面。";


?>