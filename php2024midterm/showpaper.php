<?php
session_start();

// 檢查是否登入
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "author") {
    header("Location: index.php");
    exit();
}

// 登出功能
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: logout.php");
    exit();
}
?>

<?php
// 驗證並處理提交的表單數據
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["sTitle"])) {
        $sTitleErr = "論文標題式必填的";
    } else {
        $sTitle = $_POST["sTitle"];
    }

    if (empty($_POST["sName"])) {
        $sNameErr = "姓名是必填的";
    } else {
        $sName = $_POST["sName"];
    }

    if (empty($_POST["sEmail"])) {
        $sEmailErr = "Email是必填的";
    } else {
        $sEmail = $_POST["sEmail"];
    }


    $sComment = $_POST["sComment"];

    // 如果沒有錯誤，輸出表單數據
    if (!isset($sTitleErr) && !isset($sNameErr) && !isset($sEmailErr) && !isset  ($sCommentErr)) {
        echo "論文標題:" . $sTitle . "<br>";
        echo "姓名:" . $sName . "<br>";
        echo "作者Email:". $sEmail ."<br>";
        echo "論文摘要:". $sComment ."<br>";
       
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>論文評論內容</title>
</head>
<body>
    <h2></h2>
    <p></p>
    <a href="showpaper.php?logout=true">Logout</a>
</body>
</html>
