<html>
<meta charset="utf-8">
<title>登入失敗</title>

<?php

session_start();

if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>帳號密碼錯誤</title>
</head>
<body>
    <h2>帳號密碼錯誤, 請返回登入介面重新登入!</h2>
    <p>點擊下方返回登入介面</p>
    <a href="fail.php?logout=true">Login</a>
</body>
</html>