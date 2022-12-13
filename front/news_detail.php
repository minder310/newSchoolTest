<!-- 顯示新聞，詳細資料處。內有新聞全文。 -->
<?php
$sql="SELECT * FROM `news` WHERE `id`='{$_GET['id']}'";
// 運用網頁回傳的值取出，新聞資料。
$news=$pdo->query($sql)->fetch();
// 宣告取出news一個資料。
?>
<h3 class="text-left font-weight-bolder"><?=$news['subject'];?></h3>
<div class="text-right text-secondary">
    發布時間:<?=$news['created_at'];?>
    <!-- 顯示發布時間。 -->
</div>
<div class="text-left">[<?=$news['type'];?>]</div>
<!-- 顯示新聞類型。 -->
<div style="font-size: 1.2rem;"><?=nl2br($news['content'])?></div>
<!-- 顯示內容並且自動加br斷行 專有名詞:nl2br自動加br斷行。 -->