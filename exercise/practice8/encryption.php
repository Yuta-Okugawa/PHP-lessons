<?php

    error_reporting(-1);

    $message = "4~6桁の数字を入力してください。";//送信前のメッセージ
    if(isset($_POST['enc'])){  
        // 半角数字のみかチェック
        if(!ctype_digit($_POST['enc'])){
            $message = "数字（自然数）を半角で入力してください。";
        } else{
            // POSTで飛んできた情報を変数に格納
            $enc = $_POST['enc'];
            // 正規表現でのチェック
            // 4文字以下の場合
            if(!preg_match("/[0-9]{4}/", $enc)){
                $message = "桁数が間違っています。";
            // 7文字以上の場合
            } elseif (preg_match("/[0-9]{7,}/", $enc)){
                $message = "桁数が間違っています。";
            // 正しい入力の場合
            } else {
                // 暗号化の設定
                // 検索用配列
                $num = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                // 変換用配列
                $key = array("m", "y", "V", "q", "P", "w", "x", "L", "p", "a");
                // 変換されたデータ
                $result = str_replace($num, $key, $enc);
                $message = "変換後⇒".$result;
            }
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題8：暗号化</title>
    </head>
    <body>
        <form action="encryption.php" method="post">
            <?php echo $message; ?><br>
            <input type="text" name="enc">
            <input type="submit" value="変換">
        </form>
    </body>
</html>