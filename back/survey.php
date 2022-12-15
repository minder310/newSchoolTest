<!-- 選票管理系統 -->
<h3 class="text-center">調查列表</h3>
<div class="my-4 text-center">
    <!-- 連結到新增調查頁面。 -->
    <a href="admin_center.php?do=survey_add" class="btn btn-primary">新增調查</a>
</div>
<ul class="list-group col-md-10 m-auto">
    <div class="col-7">主題</div>
    <div class="col-2">參與數</div>
    <div class="col-3">操作</div>
</ul>
<?php
// 取出票選的整張清單內容
$surveys = all("survey_subject");

foreach ($surveys as $survey) {
?>
    <li class="d-flex list-group-item list-group-item-light list-group-item-action">
        <div class="col-7 font-weight-bolder" style="font-size:1.25rem">
            <?=$survey['subject'];?>
        </div>
        <div class="col-2 text-center">0</div>
        <div class="col-3 text-center">
            <?php
            // 只是拿來宣告變數，啟用或關閉，跟顏色是顯示什麼。
            $activeBg=($survey['active']==1)?"btn-primary":"btn-secondary";
            $activeText=($survey['active']==1)?"啟用":"關閉";
            ?>
        </div>
        <a href="./api/survery_active.php?id=<?=$survey['id'];?>" class="btn btn-sm <?=$activeBg?> mx-1"><?=$activeText?></a>
        <a href="admin_center.php?do=survey_edit&id=<?=$survey['id']?>" class="btn btn-sm btn-success mx-1">編輯</a>
        <a href="./api/survey_del.php?id=<?=$survey['id']?>" class="btn btn-sm btn-info mx-1">刪除</a>
    </li>
<?php
};
?>