<!-- 更新新聞內容資料庫 -->
<h1>更新新聞內容資料庫API</h1>
<?php
include_once "../db/base.php";
// 宣告導入資料庫。

$sql="UPDATE `news`
        SET `subject`='{$_POST['subject']}',
            `content`='{$_POST['content']}',
            `type`='{$_POST['type']}',
            `top`='{$_POST['top']}',
            `readed`='{$_POST['readed']}'
        WHERE `id`='{$_POST['id']}'";

dd($sql);
echo "檢查正常記得加上，header";
$pdo->exec($sql);
?>
