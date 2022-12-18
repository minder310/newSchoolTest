<h1>刪除表單選項API</h1>
<?php
include_once "../db/base.php";
$subject_id=find("survey_options",$_GET['id'])['subject_id'];
// 取出survey_options
echo $subject_id;
echo "<br>";
dd($subject_id);
// del("survey_option",$_GET['id']);
// 刪除survey_option裡的ID得數值。並刪除，選項。
header("location:../admin_center.php?do=survey_edit&id=$subject_id");
                                                    // 回到表單subject_id；
?>