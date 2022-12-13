<!-- 上面選單頁面。 -->
<header class="shadow mb-5">
    <nav class="container d-flex justify-content-between py-3">
    <?php
        /**
         * 使用$_SERVER['PHP_SELF]來取得網址請求的檔案時，
         * 如果檔案不是在網站的根目錄下，可能會拿到一串完成的路徑字串，如：
         * '/classroom/1112/1112-PHP-MYSQL/index.php'
         * 因為我們只需要最後面的index字串做為判斷的依據，
         * 所以要先把$_SERVER['PHP_SELF']字串做處理來因應更多不確定的路徑狀況
         * 原則就是我們只取$_SERVER['PHP_SELF']的最後一個字串，並去掉副檔名
         * 
         * 因為路徑的字串型式都是以"/"做區隔，所以可以使用explode這個函式來把字串拆成陣列
         * 而要取出陣列的最後一個值，則可以使用count()-1的方式(陣列個數-1就是陣列的最後一個元素的索引值)
         * 也可以使用函式array_pop()來取得最後一個值(array_pop()的作用為回傳陣列的最後一個值)
         * 要注意的是array_pop()會使原陣列中的最後一個值從陣列中被刪除，所以要先設一個變數來代表陣列
         */
        // ------------------我是分隔線-------------------------------
        // $test=$_SERVER['PHP_SELF'];
        // $_SERVER['PHP_SELF']是一個專有名詞，用來取用，當前腳本，位置。
        // -----------------------------------------------------------
        $file_str=explode("/",$_SERVER['PHP_SELF']);
        // explode炸開$_server['php_self']，並形成陣列。
        $local=str_replace('.php','',array_pop($file_str));
        // str_replace(查找得值,替換的值,被搜索的字串。)
        // array_pop()輸出陣列的最後一個值。
        switch($local){
            // 如果local裡有index。
            case "index":
                echo "<div>";
                echo "<a class='mx-2' href='index.php'>回首頁</a>";
                // 顯示回首頁選項。
                echo "</div>";
                echo "<div>";
                echo "<!------新增功能預定------->";
                // 用網址帶值的方式讓他可以知道，要顯示網頁內容，以下都是。
                echo "<a class='mx-2' href='index.php?do=main'>最新消息</a>";
                echo "<a class='mx-2' href='index.php?do=students_list'>學生列表</a>";
                echo "<a class='mx-2' href='index.php?do=surver'>意見調查表</a>";
                echo "</div>";
                echo "<div>";
                // api/chk_user.php宣告logein在這。 
                // 要是login裡面有值，回傳回管理中心，與教師登出。還記得$_session是什麼嗎?是取用cookie值唷。
                if(isset($_SESSION['login'])){
                    // 引導去管理頁面。
                    echo "<a class='mx-2' href='admin_center.php'>回管理中心</a>";
                    // 引導去教師登出頁面。
                    echo "<a class='mx-2' href='logout.php'>教師登出</a>";
                }else{
                    // 引導去去教師註冊頁面。
                    echo "<a class='mx-2' href='index.php?do=reg'>教師註冊</a>";
                    // 引導去教師登陸頁面。
                    echo "<a class='mx-2' href='index.php?do=login'>教師登入</a>";
                }
                break;
                case "admin_center":
                    // 如果資料檔案，是admin_center。
                echo "<div>";
                // 引導回管理首頁。
                echo "<a class='mx-2' href='admin_center.php'>回管理首頁</a>";
                // 引導回網站首頁。
                echo "<a class='mx-2' href='index.php'>回網站首頁</a>";
                echo "</div>";
                echo "<div>";
                // 依照帶值顯示下列網頁。
                echo "<a class='mx-2' href='admin_center.php?do=students_list'>學生管理</a>";
                echo "<a class='mx-2' href='admin_center.php?do=news'>新聞管理</a>";
                echo "<a class='mx-2' href='admin_center.php?do=survey'>問卷管理</a>";
                echo "</div>";
                echo "<div>";
                // 教師登出的部分。
                echo "<a class='mx-2' href='logout.php'>教師登出</a>";
                echo "</div>";

        }
    ?>

    </nav>



</header>