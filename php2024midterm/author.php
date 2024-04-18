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

<!DOCTYPE html>
<html>
<head>
    <title>author Page</title>
    <body>
<div class="container">
    <h2>Author您好，歡迎進入論文投稿網頁</h2>
    <form action="showpaper.php" method="post">
        論文標題:
        <input type="text" name="sTitle" value="" required placeholder=""><br/>
        姓名:
        <input type="text" name="sName" value="" required placeholder="Please intput your name"><br/>
        作者Email:
        <input type="email" name="sEmail" value="" required><br/>
        
        <label for="Comment">論文摘要:</label>
        <textarea id="Comment" name="sComment" rows="15" cols="50" required></textarea><br>

        <input type="submit" value="提交">
        <input type="reset" value="刪除">
    </form>
    <a href="author.php?logout=true">Logout</a>
</body>
</html>
