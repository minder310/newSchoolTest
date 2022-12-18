<?php
// 宣告mysql語法，並且宣告要連結的資料庫。
$dns="mysql:host=localhost;charset=utf8;dbname=school";
// 宣告pdo=資料庫資料並匯入，上面語法，並且宣告，帳號密碼。
$pdo=new PDO($dns,'root','');

session_start();
// 宣告時間格式，並設定亞洲台北。
date_default_timezone_set("Asia/Taipei");

// 用來顯示陣列內容。並且可以快速輸出，基本上就是懶。
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function all($table,...$args)
{
    // 宣告要查找的表單，並且列出特定值給他做查詢。$args為陣列所以輸入時必須用陣列型態。
    global $pdo;
    // 宣告取出變數內的整張表單。
    $sql="select * from $table";
    // dd($sql);
    // 判斷$arge內有沒有值。
    if(isset($args[0])){
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
function q($sql)
{
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}

// 刪除資料的function。
function del($table,$id)
{
    // 取用宣告資料庫變數，
    global $pdo;
    // 宣告通用刪除，請不要把這句直接輸入，不然整個資料庫會不見唷。
    $sql ="delete from `$table`";
    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
            // 將數值變成陣列，並且儲存於陣列中。
        }
        dd($tmp);
    }else{
        // 宣告當id=$id時刪除，對應資料庫資料。
        $sql=$sql." WHERE `id`=''$id'";
    }
    echo "還沒加刪除選項，並不會執行唷";
}

// 新增資料庫運用function。
function insert($table,$cols)
{
    global $pdo;
    // 宣告取用外面的$pdo數值。
    $keys=array_keys($cols);
    // dd($keys);測試array_key是幹嘛的。
    // 取出陣列中所有的key值。
    $sql="insert into $table (`" . join("`,`",$keys)."`) values ('". join("','",$cols)."')";
    // $SQL指令為，要增加哪一個資料到哪一個$table，並且有取出所有的key並傳串聯成字串，後面輸入相對應的資料。
    dd($sql);
    // return $pdo->exec($sql);
    // 這邊是指會回傳影響了幾筆資料。
    return $pdo->exec($sql);
}

function find($table,$id){
    global $pdo;
    // 取用資料庫全域變數。
    $sql="select * from `$table` ";
    
    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
            // 要是是陣列就把她組成，語法讓他可以使用。
        }
        
        $sql=$sql . " where " . join(" && ",$tmp);
    }else{
        $sql=$sql . "where `id`='$id'";
    }
    dd($sql);
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
// 更新單筆或多筆資料。
function update($table,$col,...$args){
    global $pdo;

    $sql="update $table set ";
    // 要更新的數值。
    if(is_array($col)){
        foreach($col as $key => $value){
            $tmp[]="`$key`='$value'";
        };
        $sql =$sql . join(",",$tmp);
    }else{
        echo "錯誤，請提供陣列形式更新資料。";
    }
    // 宣告要更新的條件where。
    if(isset($args[0])){
        if(is_array($args)){
            $tmp=[];
            foreach($args as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql=$sql . "where" . join("&&",$tmp);
        }else{
            $sql=$sql . "where `id`='{$args[0]}'";
        }
    }
    echo $sql;

    return $pdo->exec($sql);
}
