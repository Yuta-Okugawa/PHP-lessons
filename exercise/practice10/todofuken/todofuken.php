<?php
error_reporting(-1);
require_once("pref_conf.php");

// 表示するメッセージの設定とバリデーションチェック
$message = "検索する地域を選択して、都道府県名を英字で入力してください。";
if(isset($_POST['str'])){
    // エラー時のメッセージ
    $message = "英字を半角で入力してください。";
    // 小文字のアルファベットか空文字なら通す
    if(ctype_alpha($_POST['str']) || $_POST['str'] == ""){
        $message = "検索結果";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題10：該当する都道府県を表示する</title>
    </head>
    <body>
        <form action="todofuken.php" method="post">
            <?php makeSelect($area); ?>
            <input type="text" size="1" value="<?php if(isset($_POST['str'])){echo $_POST['str'];}?>"  name="str">
            <br>
            <input type="submit">
        </form>
        <p><?php echo $message; ?></p>
        <hr>
        <p><?php searchResult($respArea,$readList,$prefList)?></p>
    </body>
</html>