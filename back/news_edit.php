<?php

$sqlnews = "SELECT * FROM `news` WHERE `id`='{$_GET['id']}'";
$news = $pdo->query($sqlnews)->fetch();

?>
<h2 class="text-center">編輯消息</h2>
<form action="./api/news_edit.php" method="POST">
    <div class="form-group row">
        <label class="col-form-label col-md-2 text-right">主題</label>
        <input type="text" class="form-control col-md-10" name="subject" value='<?= $news['subject']; ?>'>
        <!-- 取出主題並顯示於主題頁面。 -->
    </div>
    <!-- 開啟置頂或是不置頂 -->
    <div class="d-flex">
        <div class="col-md-6 row">

            <span class="col-md-4 text-right mr-2">置頂</span>
            <div class="form-check mx-2 d-flex align-items-cwnter">
                <input type="text" class="form-check-input" type="radio" name="top" value='1' <?= ($news['top'] == 1) ? "checked" : ""; ?>>
                <label class="col-form-label">yes</label>
            </div>
            <span class="col-md-4 text-right mr-2">置頂</span>
            <div class="form-check mx-2 d-flex align-items-cwnter">
                <input type="text" class="form-check-input" type="radio" name="top" value='0' <?= ($news['top'] == 0) ? "checked" : ""; ?>>
                <label class="col-form-label">no</label>
            </div>
        </div>
        <!-- 觀看數設定區 -->
        <div class="col-md-6 form-group row">
            <label class="col-form-label col-md-4 text-right">觀看數</label>
            <input type="number" class="form-control col-md-8" name="readed" value="<?= $news['readed']; ?>">
        </div>
    </div>
    <!-- 內容顯示區 -->
    <div class="form-group row">
        <lable class="col-form-label col-md-2 text-right">內容</lable>
        <textarea class="form-control col-md-10" name="content" style="height: 200px"><?= $news['content']; ?></textarea>
    </div>
    <!-- 顯示類別區 -->
    <div class="form-group row">
        <label class="col-form-label col-md-2 text-right">類別</label>
        <input type="text" class="form-control col-md-10" name="type" value="<?=$news['type'];?>">
    </div>
    <!-- 現在時間區 -->
    <div class="text-right text-secondary">現在時間:<?=date("Y-m-d H:i:s");?></div>
    <!-- 隱藏的id碼區，跟確定確定修改，重置區。 -->
    <div class="text-center">
        <input type="hidden" name="id" value="<?=$news['id']?>">
        <input type="submit" class="btn btn-primary mx-2" value="確定修改">
        <input type="reset" class="btn btn-warning mx-2" value="重置">
    </div>
</form>