<h3 class="text-center">新增調查<button onclick='addOption()' class="btn btn-success btn-sm py-0" style="font-size:1.5rem">+</button></h3>

<form action="./api/survey_add.php" method="post" class="col-10 mx-auto d-flex flex-wrap justify-content-end">
    <div class="form-group row col-12">
        <label class="col-2 text-right">主題</label>
        <input type="text" name="subject" class="form-control col-10">
        
    </div> 
    <!--選項區-->
    <div id="options" class="col-11">
        <div class="option form-group row col-12">
            <label class="col-2 text-right">項目1</label>
            <input type="text" name="opt[]" class="form-control col-10">
        </div>    

    </div>

<div class="text-center col-12 mt-3">
    <input class="btn btn-primary mx-1" type="submit" value="確定新增">
    <input class="btn btn-warning mx-1" type="reset" value="重置">
</div>
</form>