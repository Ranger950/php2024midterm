<html>
<meta charset="utf-8">
<title>登出網頁</title>

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
    <title>登出網頁</title>
</head>
<body>
    <h2>您已登出, 如需再次登入，請返回登入介面重新登入!</h2>
    <p>點擊下方返回登入介面</p>
    <a href="logout.php?logout=true">Logout</a>
</body>
</html>