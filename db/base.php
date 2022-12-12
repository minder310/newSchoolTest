<?php
// 宣告mysql語法，並且宣告要連結的資料庫。
$dns="mysql:host=localhost;charset=utf8;dbname=school";
// 宣告pdo=資料庫資料並匯入，上面語法，並且宣告，帳號密碼。
$pdo=new PDO($dns,'root','');

// 宣告時間格式，並設定亞洲台北。
date_default_timezone_set("Asia/Taipei");

// 用來顯示陣列內容。並且可以快速輸出，基本上就是懶。
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function all($table,...$args){
    global $pdo;
    $sql="select * from $table";

    if(isset($args)){
        if(is_array($args[0])){
            foreach($args[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
        }
    }
}
?>