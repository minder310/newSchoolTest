<!-- 刪除票選表單。 -->
<h1>刪除票選表單API</h1>
<?php
// 宣告連線資料庫。
include_once "../db/base.php";
// 從網址列，接收id並且。
$id=$_GET['id'];
// 刪除哪一張資料表內的資料，並且依照id刪除。
del("survey_subject",$id);

del("survey_options",['survet_subject'=>$id]);

echo "這邊還沒有設定heard所以不會自動轉跳唷。";
?>