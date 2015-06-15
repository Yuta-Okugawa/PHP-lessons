<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>練習問題２</title>
    </head>
    <body>
        <?php
           error_reporting(-1);

            $max = 9; //最大値
            $half = ceil($max/2); //折り返し値
            $num = ""; //数字前のスペースの初期値
            $sp = "&nbsp;&nbsp;"; //一回で増えるスペースの量
            $exSp = strlen($sp); //減らすスペースの文字数

            if(isset($_GET['index'])){
                for($i = 1; $i <= $max; $i++){
                    if($i < $half){
                        $num = "$num"."$sp";
                    } else {
                        $sl = strlen("$num");
                        $sl = $sl - $exSp;
                        $num = substr($num, 0, $sl);    
                    }
                    echo "$i"."<br>"."$num";
                }
            } else {
                echo "<form action='lesson2.php' method='get'>
                    <input type='submit' name='index' value='実行'>
                </form>";
            }
        ?>
    </body>
</html>