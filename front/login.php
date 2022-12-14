<!-- 登入頁面，製作 -->
<div class="col-md-4 mx-auto my-5 p-5 border shadow-sm">
    <h3 class="text-center">教師登入</h3>
    <?php
    // 進入登入頁面，回傳值為error，即顯示登入錯誤幾次，並且顯示。
    if(isset($_GET['error']))
    {
        echo "<div class='text-danger text-center'>";
        echo "帳號密碼登入錯誤,";
        echo "登入嘗試".$_SESSION['login_try']."次";
        echo "</div>";
    }
    ?>
        <!-- 將帳號密碼，傳值至../api/chk_user.php -->
    <form action="./api/chk_user.php" method="post">
        <div class="form-group">
            <label>帳號</label>
            <input type="text" class="form-control" name="acc" id="">
        </div>
        <div class="form-group">
            <label>密碼</label>
            <input  class="form-control" type="password" name="pw" id="">
        </div>
        <div class="text-center">
            <input class="btn btn-primary" type="submit" value="登入" id="">
        </div>
    </form>
</div>