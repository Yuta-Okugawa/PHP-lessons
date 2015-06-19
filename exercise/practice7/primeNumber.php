<?php

    error_reporting(-1);
    
    $min = 1;
    $max = 100;
    $total = 0;
    $message = $min."~".$max."までの素数を除いた数字を足す";

    if(isset($_POST['add'])){
        // $min~$maxまでの足し算を繰り返す
        for($i = $min ; $i <= $max; $i++){
            // 
            $count = 0;
            for($j = 1; $j <= $i; $j++){
                
                if($i % $j == 0){
                    $count = $count + 1;  
                }
            }
            if($count == 2){
                if($i == 2){
                    $i = $i +2;
                } else {
                    $i += 1;
                }
            }
            $total = $total + $i;
        }
        
        $message = $min."~".$max."までの素数を除いた合計は".$total."です。";
    }

    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題7:<?php echo $min; ?>~<?php echo $max; ?>までの素数以外の数字を足す</title>
    </head>
    <body>
        <form action="primeNumber.php" method="post">
            <?php echo $message; ?><br>
            <input type="submit" name="add" value="足す">
        </form>
    </body>
</html>