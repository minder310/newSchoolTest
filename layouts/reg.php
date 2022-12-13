<!-- 教師註冊網站，前端。 -->
<div class="col-md-4 mx-auto my-5 p-5 border shadow-sm">
    <h3 class="text-center">教師註冊</h3>
    <form action="../api/reg_user.php" method="post">
    <div class="form-group">
        <label>帳號</label>
        <input type="text" class="form-control" name="acc">
    </div>
    <div class="form-group">
        <label>密碼</label>
        <input type="password" class="form-control" name="pw">
    </div>
    <div class="form-group">
        <label>信箱</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>姓名</label>
        <input type="text" class="form-control" name="name">
    </div> 
    <div class="text-center">
        <input type="submit" class="btn btn-primary mx-2" value="註冊">
        <input type="reset" class="btn btn-primary mx-2" value="重置">
    </div>
    </form>
</div>