<!-- 新增新聞news api連結資料庫用 -->
<?php
include_once "../db/base.php";

$sql="INSERT INTO `news` ( `subject`,`content`,`type`)
            VALUES ('{$_POST['subject']}',
                    '{$_POST['content']}',
                    '{$_POST['type']}')";
dd($sql);

$pdo->exec($sql);
                
echo "沒有header所以不會自動跳回，要記得跳回。"
?>