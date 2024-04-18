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

<!DOCTYPE html>
<html>
<head>
    <title>reviewer Page</title>
</head>
<body>
<div class="container">
    <h2>Reviewer您好，歡迎進入論文評論網頁</h2>
    <form action="showreview.php" method="post">
    <label for="Size">論文評審決定：</label>
    <input type="radio" id="Accept" name="skind" value="Accept" required><label for="skind1">Accept</label>
        <input type="radio" id="Minor Revision" name="skind" value="Minor Revision"><label for="skind2">Minor Revision</label>
        <input type="radio" id="Major Revision" name="skind" value="Major Revision"><label for="skind3">Major Revision</label>
        <input type="radio" id="Reject" name="skind" value="Reject"><label for="skind4">Reject</label><br>
        
        <label for="Comment">論文評論評語:</label>
        <textarea id="Comment" name="Comment" rows="5" cols="50"></textarea><br>
        <input type="submit" value="提交">
        <input type="reset" value="刪除">
    </form>
    <a href="reviewer.php?logout=true">Logout</a>
</body>
</html>
