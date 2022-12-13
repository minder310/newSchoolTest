<!-- 教師註冊頁面，api -->
<?php
include "../db/base.php";

$acc=trim(strip_tags($_POST['acc']));
// strip_tags消除裡面有關html的語法標籤。
// trim式消除前後空白。
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);

$sql="insert into `users` (`acc`,`pw`,`name`,`email`) values('$acc','$pw','$name','$email')";
// 宣告輸入那些資料進資料庫，並且建立檔案。
echo "acc=>".$acc;
echo "<br>";
echo "pw=>".$pw;
echo "<br>";
echo "name=>".$name;
echo "<br>";
echo "email=>".$email;
echo "<br>";

$a=$pdo->exec($sql);
// exec是指有變更影響會回傳影響的數量，並進行回傳。
echo $a;
?>