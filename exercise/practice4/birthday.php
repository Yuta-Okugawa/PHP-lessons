<?php
    $result = "生年月日を入力してください ※1980年1月1日の場合（19800101）と入力してください。";
    if(isset($_POST['birth'])){
        if(!ctype_digit($_POST['birth'])){
            $result = "数字を半角で入力してください。";
        } elseif(mb_strlen($_POST['birth']) != 8){
            $result = "桁数が間違っています。"; 
        } else {
            $year = substr($_POST['birth'], 0, 4);
            $month = substr($_POST['birth'], 4, 2);
            $day = substr($_POST['birth'], 6, 2);
            
            if (!checkdate($month, $day, $year)){
                $result = "正しい日付を入力してください。";
            } else {
                $now = date("Ymd");
                $result = "年齢は".floor(($now-($_POST['birth'])) / 10000)."歳です。";
            }
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題4 年齢計算</title>
    </head>
    <body>
        <form action="birthday.php" method="post">
            <?php echo $result; ?><br>
            <input type="text" name="birth">
            <input type="submit" value="年齢を見る">
        </form>
    </body>
</html>