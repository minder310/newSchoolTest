<h1 class="text-center">新聞管理</h1>
<a href="admin_center.php?do=add_news" class="btn btn-primary">新增消息</a>
<hr>
<ul class="list-group">
    <li class="list-group-item list-group-item-action d-flex text-center be-info text-withe">
        <div class="col-md-6">標題</div>
        <div class="col-md-1">置頂</div>
        <div class="col-md-1">點閱數</div>
        <div class="col-md-2">發佈時間</div>
        <div class="col-md-2">操作</div>
    </li>
    <?php
    $all_news = "SELECT * FROM `news`";
    $rows = $pdo->query($all_news)->fetchAll();
    // 取出所有news資料。

    foreach ($rows as $row) {
        echo "<li class='list-group-item list-group-item-action d-flex'>";
        echo "<div class='col-md-6'>";
        echo $row['subject'];
        // 取出主題，並且顯示。
        echo "</div>";
        echo "<div class='col-md-1'>";
        echo ($row['top'] == 1) ? "TOP" : "";
        // 如果置頂為1，即顯示top。
        echo "</div>";
        echo "<div class='col-md-1'>";
        echo $row['readed'];
        // 取出閱讀數，並顯示於頁面上。
        echo "</div>";
        echo "<div class='col-md-2'>";
        echo $row['created_at'];
        // 顯示建立日期。
        echo "</div>";

        echo "<div class='col-md-2 text-center'>";
        echo "<a class='btn btn-info mx-2' href='admin_center.php?do=news_edit&id={$row['id']}'>編輯</a>";
        // 導到news_edit頁面並傳入，讓網站知道是要用哪個id取出資料。
        echo "<a class='btn btn-danger mx-2' href='./api/news_del.php?id={$row['id']}'>刪除</a>";
        //如果要做中間確認對話的功能,使用以下的連結
        //echo "<a class='btn btn-danger mx-2' href='admin_center.php?do=news_del&id={$row['id']}'>刪除</a>";
        echo "</div>";
        echo "</li>";
    }
    ?>
</ul>