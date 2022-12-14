<?php

$sqlnews = "SELECT * FROM `news` WHERE `id`='{$_GET['id']}'";
$news = $pdo->query($sqlnews)->fetch();

?>
<h2 class="text-center">編輯消息</h2>
<form action="./api/news_edit.php" method="POST">
    <div class="form-group row">
        <label class="col-form-label col-md-2 text-right">主題</label>
        <input type="text" 
                class="form-control col-md-10" 
                name="subject"
                value='<?=$news['subject'];?>'>
                <!-- 取出主題並顯示於主題頁面。 -->
    </div>
    <div class="d-flex">
        <span class="col-md-4 text-right mr-2">置頂</span>
        <div class="form-check mx-2 d-flex align-items-cwnter">
            <input type="text" class="form-check-input" type="radio" name="top" value='1' <?=($news['top']==1)?"checked":"";?>>
            <label class="col-form-label">yes</label> 
        </div>
        <span class="col-md-4 text-right mr-2">置頂</span>
        <div class="form-check mx-2 d-flex align-items-cwnter">
            <input type="text" class="form-check-input" type="radio" name="top" value='0' <?=($news['top']==0)?"checked":"";?>>
            <label class="col-form-label">no</label> 
        </div>
        
        
    </div>
</form>