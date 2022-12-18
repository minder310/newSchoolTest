<!-- 新增選項API -->
<h1>新增選項API</h1>
<?php
include_once "../db/base.php";
// 建立資料庫陣列。
$subject=['subject'=>$_POST['subject'],
            'type'=>1,
            'vote'=>0,
            'active'=>0];
        // 宣告要輸入得選項，與資料。
// inster function可以寫入資料庫資料。
insert('survey_subject',$subject);

$subject_id=find('survey_subject',['subject'=>$_POST['subject']])['id'];

if(isset($_POST['opt'])){
    foreach($_POST['opt'] as $option){
        if($option!=''){
            $tmp=['opt'=>$option,
                    'subject_id'=>$subject_id,
                    'vote'=>0];
            dd($tmp);
            insert('survey_options',$tmp);
        }
    }
}
echo "還沒寫header，還沒做轉跳頁面。測試完成記得要做唷。"
?>