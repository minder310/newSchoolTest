<!-- 後端登入，api -->
<?php
include "../db/base.php";
// 導入資料庫檔案。
// 這邊是兩點。
session_start();
// 宣告session可以使用。並且可以傳值。

//導入帳號密碼用post的方式傳值。
$acc=$_POST['acc'];
$pw=$_POST['pw'];

$sql="select count(`id`) from `users` where `acc`='$acc' && `pw`='$pw'";
// 顯示users表單中，acc==acc和pw==pw值得id。 要記得這是語法宣告，下面才會帶進資料庫中。
$chk=$pdo->query($sql)->fetchColumn();
// fetchColumn()回傳一列，如果有多列，只會顯示最上面的一列，如果沒有則回傳回false。
// 這邊在我看來是用來宣告，是否有這個帳號密碼用的初階。

// 回傳值==1等於有這個帳號密碼。
if($chk==1){
    $sql="select `id`,`acc`,`name`,`last_login` from `users` where `acc`='$acc' && `pw`='$pw'";
    // 從users取出id acc name last_login條件是acc==acc和pw==pw。
    $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    // 取出使用者資料，並且將login=user資料。
    dd($user);
    $_SESSION['login']=$user;
    header("location:../admin_center.php");
}else{
    if(isset($_SESSION['login_try'])){
        $_SESSION['login_try']++;
    }else{
        $_SESSION['login_try']=1;
    }
    header("location:../index.php?do=login&error=login");
}
echo "這邊沒有加header，所以不會自動跳回去。";









?>