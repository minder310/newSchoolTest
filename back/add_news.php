<!-- 新增消息頁面。 -->
<h1 class="text-center">新增消息</h1>
<form action="./api/add_news.php" method="POST">
    <div class="form-froup row">
        <lable class="col-form-label col-md-2 text-right">主題</lable>
        <input type="text" class="form-control col-md-10" name="subject">
    </div>
    <div class="form-froup row">
        <lable class="col-form-label col-md-2 text-right">內容</lable>
        <textarea name="content" class="form-control col-md-10" style="height:200px"></textarea>
    </div>
    <div class="form-froup row">
        <lable class="col-form-label col-md-2 text-right">類別</lable>
        <input type="text" class="form-control col-md-10" name="type">
    </div>
    <div class="text-right text-secondary">現在時間<?=date("Y-m-d H:i:s")?></div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary mx-2" value="確定新增">
        <input type="reset" class="btn btn-waring mx-2" value="清空">
    </div>
    可以增加是否置頂。
</form>