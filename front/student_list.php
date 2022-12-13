<?php
include "./layouts/class_nav.php"
?>
<?php
if(isset($_GET['code'])){
    // 此段是有選班級時會撈出$_GET的資料。
    //輸出students的id.school_num.name.birthday.graduate_at，從class_student和students，當條件符合。`class_student`.`school_num`= `students`.`school_num` &&
    //`class_student`.`class_code`='{$_GET['code']}'"
    $sql="SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                `students`.`name` as '姓名',
                `students`.`birthday` as '生日'
                `students`.`graduate_at` as '畢業國中'
            FROM `class_student`,`students`
            WHERE `class_student`.`school_num`= `students`.`school_num` &&
                `class_student`.`class_code`='{$_GET['code']}'";
    $sql_total = "SELECT count(`students`.`id`)
                FROM `class_student`,`students`
                WHERE `class_student`.`school_num`=`students`.`school_num` &&
                        `class_student`.`class_code`='{$_GET['code']}'";
}else{
    // 如果沒有宣告班級，就一次只輸出20筆資料。
    $sql ="SELECT `students`.`id`,
                    `students`.`school_num` as '學號',
                    `students`.`name` as '姓名',
                    `students`.`birthday` as '生日',
                    `students`.`graduate_at` as '畢業國中'
            FROM  `students`";
    $sql_total ="SELECT count(`students`.`id`)
                FROM `students`";
}
// 分頁參數處理中心。





?>