<?php
session_start();

// 定義帳號密碼
$accounts = array(
    "chair" => "123",
    "reviewer" => "234",
    "author" => "345"
);

// 檢查輸入的帳號密碼
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    // 檢查帳號密碼是否正確
    if (array_key_exists($username, $accounts) && $accounts[$username] === $password && $accounts[$username]) {
        // 設置 session 變數
        $_SESSION["username"] = $username;
        
        // 導向到不同的頁面
        if ($username === "chair") {
            $_SESSION["message"] = "Welcome,chair！";
            header("Location: chair.php");
            exit();
        } elseif ($username === "reviewer") {
            $_SESSION["message"] = "Welcome,reviewer！";
            header("Location: reviewer.php");
            exit();
        } elseif ($username === "author") {
            $_SESSION["message"] = "Welcome,author！";
            header("Location: author.php");
            exit();
        }
    } else {
        // 帳號密碼錯誤
        $_SESSION["error"] = "帳號或密碼錯誤";
        header("Location: fail.php");
        exit();
    }
} else {
    // 如果未輸入帳號密碼，返回登入頁面
    header("Location: logout.php");
    exit();
}
?>
