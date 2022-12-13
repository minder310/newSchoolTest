<nav class="d-flex justify-content-center">
<div>
    <a href="?do=students_list" class="btn btn-primary m-2">全部</a>
</div>
<div class="d-flex flex-wrap col-md-7">
<?php
    $sql="SELECT `id`,`code`,`name` FROM `classes`";
    // 這邊是宣告，要取出的id,code,name，從classes。
    $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // 宣告要取出所有的值，並且輸近$classes中。
    foreach($classes as $class){
        echo "<a class='btn btn-success' href='?do=students_list&code={$class['code']}'>{$class['name']}</a>";
    }
?>
</div>
</nav>