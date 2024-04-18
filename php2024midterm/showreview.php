<?php
session_start();

// 檢查是否登入
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "reviewer") {
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
    
    // 論文評審決定
    if (empty($_POST["skind"])) {
        $sKindErr = "論文評審決定是必填的";
    } else {
        $sKind = $_POST["skind"];
    }

    // 評論
    $sComment = $_POST["Comment"];

    // 如果沒有錯誤，輸出表單數據
    if (!isset($sKindErr)) {
        echo "論文評審決定：" . $sKind . "<br>";
        echo "論文評論評語：" . $sComment . "<br>";
       
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
    <a href="showreview.php?logout=true">Logout</a>
</body>
</html>
