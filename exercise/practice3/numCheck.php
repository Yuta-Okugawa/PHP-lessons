<?php

    error_reporting(-1);

    $result = "九桁の数字を入力してください。";
    if(isset($_POST['int'])){  
        if(!ctype_digit($_POST['int'])){
            $result = "数字（自然数）を半角で入力してください。";
        } else{
            $int = (int)$_POST['int'];
            if(!preg_match("/[0-9]{9}/", $int)){
                $result = "桁数が間違っています。"; 
            } elseif(preg_match("/[0-9]{10,}/", $int)){
                $result = "桁数が間違っています。"; 
            } else {
                $array = preg_split("//",$int);
                //var_dump($array);
                $result = "九つの数字の合計は「".array_sum($array)."」です。";
            }
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題3　足し算</title>
    </head>
    <body>
        <form action="numCheck.php" method="post">
            <?php echo $result; ?><br>
            <input type="text" name="int">
            <input type="submit" value="check">
        </form>
    </body>
</html>