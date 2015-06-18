<?php

    error_reporting(-1);
    
    $min = 1;
    $max = 100;
    $num = $min;
    $result = $min."~".$max."までの数字を足す";

    if(isset($_POST['add'])){
       
        for($i=$min + 1; $i<=$max; $i++){
            $num = $num + $i;
        }
        $result = $min."~".$max."までの合計は".$num."です。";
    }

    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題6:<?php echo $min; ?>~<?php echo $max; ?>までの数字を足す</title>
    </head>
    <body>
        <form action="addition.php" method="post">
            <?php echo $result; ?><br>
            <input type="submit" name="add" value="足す">
        </form>
    </body>
</html>