<?php
include "./layouts/class_nav.php"
?>
<?php
if (isset($_GET['code'])) {
    // 此段是有選班級時會撈出$_GET的資料。
    //輸出students的id.school_num.name.birthday.graduate_at，從class_student和students，當條件符合。`class_student`.`school_num`= `students`.`school_num` &&
    //`class_student`.`class_code`='{$_GET['code']}'"
    $sql = " SELECT `students`.`id`,
                    `students`.`school_num` as '學號',
                    `students`.`name` as '姓名',
                    `students`.`birthday` as '生日',
                    `students`.`graduate_at` as '畢業國中'
            FROM    `class_student`,`students`
            WHERE   `class_student`.`school_num`= `students`.`school_num` &&
                    `class_student`.`class_code`='{$_GET['code']}'";
    $sql_total = " SELECT count(`students`.`id`)
                FROM `class_student`,`students`
                WHERE `class_student`.`school_num`=`students`.`school_num` &&
                        `class_student`.`class_code`='{$_GET['code']}'";
} else {
    // 如果沒有宣告班級，就一次只輸出20筆資料。
    $sql = "SELECT `students`.`id`,
                    `students`.`school_num` as '學號',
                    `students`.`name` as '姓名',
                    `students`.`birthday` as '生日',
                    `students`.`graduate_at` as '畢業國中'
            FROM  `students`";
    $sql_total = "SELECT count(`students`.`id`)
                FROM `students`";
}
// 分頁參數處理中心。
$div = 10;
// 每頁顯示頁數。
$total = $pdo->query($sql_total)->fetchColumn();
// fetchColumn()會回傳有幾筆資料。
$pages = ceil($total / $div);
// $total/$div就可以知道總共有幾頁。
// ceil為/之後強制為整數。
$now = $_GET['page'] ?? 1;
// 如果$_get['page']沒有值就直接預設為1第一頁的意思。
$start = ($now - 1) * $div;
// 這句不懂。
$sql = $sql . " LIMIT $start,$div";
// dd($sql);
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
dd($sql);
// 這裡不知道為什麼報錯。
?>
<div class="pages">
    <?php
    // 宣告上一頁，的箭頭顯示，出現與否。
    // 當前頁碼-1小於等於0不顯示。
    if (($now - 1) >= 1) {
        $prev = $now - 1;
        if (isset($_GET['code'])) {
            echo "<a href='?do=students_list&page=$prev&code={$_GET['code']}'>";
            // 宣告一個a連結並可以帶到上一頁。
            echo "&lt; ";
            // 這邊是宣告箭頭符號。
            echo "</a>";
        } else {
            echo "<a href='?do=students_list&page=$prev'>";
            echo "&lt; ";
            echo "</a>";
        }
    } else {
        echo "<a class='noshow'>&nbsp;</a>";
    }
    ?>
    <div>
        <?php
        // 顯示第一頁
        if ($now >= 4) {
            if (isset($_GET['code'])) {
                echo "<a href='?do=students_list&page=1&code={$_GET['code']}'> ";
                echo "1 ";
                echo " </a>...";
            } else {

                echo "<a href='?do=students_list&page=1'> ";
                echo "1 ";
                echo " </a>...";
            }
        }
        ?>
        <?php
        //頁碼區
        //只顯示前後四個頁碼

        if ($now >= 3 && $now <= ($pages - 2)) {  //判斷頁碼在>=3 及小於最後兩頁的狀況
            $startPage = $now - 2;
        } else if ($now - 2 < 3) { //判斷頁碼在1,2頁的狀況
            $startPage = 1;
        } else {  //判斷頁碼在最後兩頁的狀況
            $startPage = $pages - 4;
        }

        for ($i = $startPage; $i <= ($startPage + 4); $i++) {
            $nowPage = ($i == $now) ? 'now' : '';
            if (isset($_GET['code'])) {
                echo "<a href='?do=students_list&page=$i&code={$_GET['code']}' class='$nowPage'> ";
                echo $i;
                echo " </a>";
            } else {
                echo "<a href='?do=students_list&page=$i' class='$nowPage'> ";
                echo $i;
                echo " </a>";
            }
        }
        ?>
        <?php
        //顯示第最後一頁
        if ($now <= ($pages - 3)) {
            if (isset($_GET['code'])) {
                echo "...<a href='?do=students_list&page=$pages&code={$_GET['code']}'> ";
                echo "$pages";
                echo " </a>";
            } else {

                echo "...<a href='?do=students_list&page=$pages'> ";
                echo "$pages";
                echo " </a>";
            }
        }
        ?>
    </div>
    <div>
        <?php
        //下一頁
        //當前頁碼+1,可是不能超過總頁數,最大是總頁數,如果超過總頁數,不顯示
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            if (isset($_GET['code'])) {
                echo "<a href='?do=students_list&page=$next&code={$_GET['code']}'> ";
                //echo "< ";
                echo "&gt; ";
                echo " </a>";
            } else {
                echo "<a href='?do=students_list&page=$next'> ";
                //echo " >";
                echo "&gt; ";
                echo " </a>";
            }
        } else {
            echo "<a class='noshow'>&nbsp;</a>";
        }

        ?>
    </div>
    <table class="list-students">
        <tr>
            <td>學號</td>
            <td>姓名</td>
            <td>生日</td>
            <td>畢業國中</td>
            <td>年齡</td>
        </tr>
        <?php
        foreach($rows as $row){
            $age=round((strtotime('now')-strtotime($row['生日']))/(60*60*24*365),1);

            echo "<tr>";
            echo "<td>{$row['學號']}</td>";
            echo "<td>{$row['姓名']}</td>";
            echo "<td>{$row['生日']}</td>";
            echo "<td>{$row['畢業國中']}</td>";
            echo "<td>{$age}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>