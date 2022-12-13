<!-- 顯示最新消息，並且會依照。 -->
<h1 class="text-center">最新消息</h1>
<ul class="list-group">
    <li class='list-group-item list-group-item-action d-flex text-center bg-info text-white'>
        <div class='col-md-10'>標題</div>
        <div class='col-md-2'>人氣</div>
    </li>

    <?php
    /* $all_news="SELECT * FROM `news`  ORDER by `top` desc,`readed` desc ";
    $rows=$pdo->query($all_news)->fetchAll(); */
    // 這邊的與法會用function all進行代替。

    $rows=all('news'," ORDER by `top` desc,`readed` desc");
    // 從news 表單 依照ORDER 反向排列，後面可以直接輸入你要搜尋的條件，所以all是萬用。
    // 請注意空格，要是沒有空格可能會錯。

    //$hot=$pdo->query("SELECT `id` FROM `news` ORDER BY `readed` desc")->fetchColumn();
    $hot=q("SELECT `id` FROM `news` ORDER BY `readed` desc ")[0][0];
    // 宣告顯示id來自news依照readed顯示。
    foreach($rows as $row){
        echo "<li class='list-group-item list-group-item-action d-flex'>";
        echo "<div class='col-md-10'>";
        echo ($row['top']==1)?"top":'';
        // 要是top值內有值，則輸出置頂。
        echo ($row['id']==$hot)?"hot":'';
        // 如果id值為最新，則輸出熱門字樣。
        echo "<a href='index.php?do=news_detail&id={$row['id']}'>";
        // 生產一個按鍵，並且會導到$row['id']相關的資料處。
        echo $row['subject'];
        // 顯示主題。
        echo "</a>";
        echo "</div>";
        echo "<div class='col-md-2 text-center'>";
        echo $row['readed'];
        // 顯示閱讀量。
        echo "</div>";
        echo "</li>";
    }
    ?>
</ul>