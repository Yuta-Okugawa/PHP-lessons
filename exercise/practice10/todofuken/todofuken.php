<?php
    error_reporting(0);
    require_once("pref_conf.php");

    $resArray ="";
    
    $message = "アルファベット1文字を入力してください。";
    if(isset($_POST['str'])){
        if(!ctype_alpha($_POST['str'])){
            $message = "アルファベットを半角で入力してください。";
        } elseif(mb_strlen($_POST['str']) != 1){
            $message = "文字数は1文字入力してください。"; 
        } else {
            $message = $_POST['str']."で始まる都道府県";
            $searchKey = mb_strtolower($_POST['str']);
            $resArray = array();
            $i = 0;
            foreach ($prefectures as $key => $value){
                if($value == $searchKey){
                    $resArray[$i] = $key;
                    $i++;
                }
            }
        }
    }
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題１０： 当する都道府県名をすべて表示</title>
    </head>
    <body>
        <form action="todofuken.php" method="post">
            <?php echo $message; ?><br>
            <?php resPlef($resArray); ?><br>
            <input type="text" size="1" maxlength="1" name="str">
            <input type="submit" value="変換">
        </form>


    </body>
</html>