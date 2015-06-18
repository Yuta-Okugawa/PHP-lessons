<?php
    $result = "変換するアルファベット1文字を大文字で入力してください。";
    if(isset($_POST['str'])){
        if(!ctype_upper($_POST['str'])){
            $result = "アルファベットを半角大文字で入力してください。";
        } elseif(mb_strlen($_POST['str']) != 1){
            $result = "文字数は1文字入力してください。"; 
        } else {
            $result = mb_strtolower($_POST['str']);
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題5 大文字→小文字変換</title>
    </head>
    <body>
        <form action="strChange.php" method="post">
            <?php echo $result; ?><br>
            <input type="text" size="1" maxlength="1" name="str">
            <input type="submit" value="変換">
        </form>
    </body>
</html>