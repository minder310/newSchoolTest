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
    // 宣告要查找的表單，並且列出特定值給他做查詢。$args為陣列所以輸入時必須用陣列型態。
    global $pdo;
    // 宣告取出變數內的整張表單。
    $sql="select * from $table";
    // dd($sql);
    // 判斷$arge內有沒有值。
    if(isset($args)){
        // 判斷$args不是陣列。
        if(is_array($args[0])){
            // dd($sql);
            // dd($args[0]);
            foreach($args[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql=$sql." WHERE ".join(" && ",$tmp);
            // join，如果只有一個值，就不會顯示要兩個值，以上才會顯示。
            // join是合併查詢，
        }else{
            // 是字串。
            $sql=$sql.$args[0];
        }
    }

    if(isset($args[1])){
        $sql = $sql . $args[1];
    }
    // 取出陣列內$sql內的表單，fttchAll所有值。
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

//萬用SQL函式，就是用來少打$PDO->query($sql)->fetchALL();用的直接打入指令。就可以顯示。
function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}
?>