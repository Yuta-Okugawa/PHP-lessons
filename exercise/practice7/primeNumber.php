<?php

    error_reporting(-1);
    
    $min = 1;
    $max = 100;
    $total = 0;
    $message = $min."~".$max."までの素数を除いた数字を足す";
 
    if(isset($_POST['add'])){
        // $min~$maxまでの足し算を繰り返す
        for($i = $min ; $i <= $max; $i++){
            $count = 0;
            prime($i,$count);
            $total = $total + $i;
        }
        
        $message = $min."~".$max."までの素数を除いた合計は".$total."です。";
    }

    // 素数を判定して飛ばす関数
    function prime(&$i,&$count){
        // 1から$iまでの数で$1を剰余算
        for($j = 1; $j <= $i; $j++){
            // わり切れた回数をカウント
            if($i % $j == 0){
                $count = $count + 1;  
            }
        }
        // わり切れた回数が二回なら素数
        if($count == 2){
            // 2は次が素数なので二つ飛ばす
            if($i == 2){
                $i = $i +2;
            // 他は一つ飛ばす
            } else {
                $i += 1;
            }
            
        }
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