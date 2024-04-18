<?php
session_start();

// 檢查是否登入
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "chair") {
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
    <title>chair Page</title>
</head>
<body>
    <h2>Welcome, chair!</h2>
    <p>You are now in the chair Page.</p>
    <a href="chair.php?logout=true">Logout</a>
</body>
</html>
