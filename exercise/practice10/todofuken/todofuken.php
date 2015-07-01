<?php
    error_reporting(0);
    require_once("pref_conf.php");
    
    // 初期メッセージ
    $message = "アルファベット1文字を入力してください。";
    if(isset($_POST['alpha'])){
        
        // False時のメッセージ
        $message = "アルファベットを半角で入力してください。";
        // バリデーションチェック
        if(ctype_alpha($_POST['alpha'])){
            // 大文字だった場合小文字へ変換
            $alpha = strtolower($_POST['alpha']);
            $message = $_POST['alpha']."で始まる都道府県";
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題10:該当する都道府県名をすべて表示</title>
    </head>
    <body>
        <?php echo $message; ?><br>
        <?php resPrefs($prefectures,$alpha); ?><br>
        <form action="todofuken.php" method="post">
            <input type="text" size="1" maxlength="1" name="alpha">
            <input type="submit" value="表示">
        </form>
    </body>
</html>