<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>

    

    <form action="check.php" method="post">
        <label for="Character">請選擇您的角色：</label>
        <select id="Character" name="Character" required>
            <option value="Chair">Chair</option>
            <option value="Reviewer">Reviewer</option>
            <option value="Author">Author</option>
            </select><br>
        <label for="username">帳號:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">密碼:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
