<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>練習問題２</title>
    </head>
    <body>
        <?php
            
            $max = 9; //最大値
            $half = ceil($max/2); //折り返し値
            $ = ""; //数字前のスペースの初期値
            $sp = "&nbsp;&nbsp;"; //一回で増えるスペースの量

            for($i= 1; $i<=$max; $i++){
                if($i <= $half){
                    $num = $i - 1;    
                } else {
                    $num = $max - $i;
                }
                $resultSp = str_repeat ($sp, $num );
                echo $resultSp.$i."<br>";   
            } 
        ?>
    </body>
</html>