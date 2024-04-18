<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies Example</title>
</head>
<body>
    <?php
    // 設定時區為台灣
    date_default_timezone_set('Asia/Taipei');

    // 檢查是否有姓名和數字的 POST 資料
    if(isset($_POST['name']) && isset($_POST['number1']) && isset($_POST['number2'])) {
        // 取得姓名
        $name = $_POST['name'];
        // 取得兩個數字
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];

        // 設定 Cookie 並設定有效期為 3 分鐘
        setcookie('user_name', $name, time() + 180);

        // 取得當前伺服器時間
        $current_hour = date('H');
        $greeting_message = '';

        // 根據時間決定問候語
        if($current_hour >= 0 && $current_hour < 6) {
            $greeting_message = "<p style='font-weight:bold; color:red;'>現在是凌晨時刻，請快休息！</p>";
        } elseif($current_hour >= 6 && $current_hour < 12) {
            $greeting_message = "<p style='font-style:italic; color:green;'>早安，您好。</p>";
        } elseif($current_hour >= 12 && $current_hour < 18) {
            $greeting_message = "<p style='font-style:italic; color:blue;'>午安，您好。</p>";
        } else {
            $greeting_message = "<p style='font-weight:bold; color:black;'>晚安，準備睡覺囉。</p>";
        }

        // 顯示問候語
        echo $greeting_message;

        // 顯示姓名
        echo "<p>歡迎 {$name} 再次回到網站。</p>";

        // 顯示計算結果
        echo "<p>計算結果：</p>";
        echo "<ul>";
        echo "<li>{$number1} + {$number2} = " . ($number1 + $number2) . "</li>";
        echo "<li>{$number1} - {$number2} = " . ($number1 - $number2) . "</li>";
        echo "<li>{$number1} × {$number2} = " . ($number1 * $number2) . "</li>";
        if($number2 != 0) {
            echo "<li>{$number1} ÷ {$number2} = " . ($number1 / $number2) . "</li>";
        } else {
            echo "<li>除數不能為零</li>";
        }
        echo "<li>{$number1} 的 {$number2} 次方 = " . pow($number1, $number2) . "</li>";
        echo "</ul>";

    } elseif(isset($_COOKIE['user_name'])) { // 檢查是否有 Cookies 存在
        // 取得 Cookies 中的姓名
        $name = $_COOKIE['user_name'];
        // 取得當前伺服器時間
        $current_hour = date('H');
        $greeting_message = '';

        // 根據時間決定問候語
        if($current_hour >= 0 && $current_hour < 6) {
            $greeting_message = "<p style='font-weight:bold; color:red;'>現在是凌晨時刻，請快休息！</p>";
        } elseif($current_hour >= 6 && $current_hour < 12) {
            $greeting_message = "<p style='font-style:italic; color:green;'>早安，您好。</p>";
        } elseif($current_hour >= 12 && $current_hour < 18) {
            $greeting_message = "<p style='font-style:italic; color:blue;'>午安，您好。</p>";
        } else {
            $greeting_message = "<p style='font-weight:bold; color:black;'>晚安，準備睡覺囉。</p>";
        }

        // 顯示問候語和姓名
        echo $greeting_message;
        echo "<p>歡迎 {$name} 再次回到網站。</p>";

    } else {
        // 若沒有姓名和數字的 POST 資料，或者 Cookies 不存在，顯示輸入表單
    ?>
    <form method="post" action="cookies.php">
        <label for="name">姓名：</label>
        <input type="text" name="name" required><br>
        <label for="number1">數字1：</label>
        <input type="number" name="number1" required><br>
        <label for="number2">數字2：</label>
        <input type="number" name="number2" required><br>
        <button type="submit">提交</button>
    </form>
    <?php
    }
    ?>
</body>
</html>
