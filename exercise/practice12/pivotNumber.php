<?php
error_reporting(-1);
/*設定-------------------------------------------------------*/

define('BOXCOUNT',3);
define('MIN',1);
define('MAX', pow(BOXCOUNT,2));


/*MODEL-------------------------------------------------------*/

//$array二$inputNumberを代入し、キーでソートする関数
function pivotArray($array, $inputNumber){
    $i=1;
    
    foreach($array as $key=>$value){
        $array[$key]=$inputNumber[$i];
        $i++;
    }
    //
    ksort($array);
    //
    return $array;
}


//左回転用のキー番号をもった配列の生成する関数
function makeTurnLeftArray($inputNumber){
    //回転用の配列を作るための配列を設定
    for($i=MIN; $i<=BOXCOUNT; $i++){
        $decrementForLeftArray[]=$i;
    }
    
    //上記の配列を用いて回転後の配列のキーを設定
    foreach($decrementForLeftArray as $value){
        for($i=(MAX-(BOXCOUNT-$value)); $i>=MIN; $i=$i-BOXCOUNT){
            $turnLeftArray[$i]="";
        }
    }
    //上記の配列に飛んできたデータを入れたのち、キーでソートする
    $turnLeftArray = pivotArray($turnLeftArray, $inputNumber);
    return $turnLeftArray;
}


//右回転用のキー番号をもった配列の生成する関数
function makeTurnRightArray($inputNumber){
    //回転用の配列を作るための配列を設定
    for($i=BOXCOUNT; $i>=MIN; $i--){
        $decrementForRightArray[]=$i;
    }

    //上記の配列を用いて回転後の配列のキーを設定
    foreach($decrementForRightArray as $value){
        for($i=(BOXCOUNT-(BOXCOUNT-$value)); $i<=MAX; $i=$i+BOXCOUNT){
            $turnRightArray[$i]="";
        }
    }
    //上記の配列に飛んできたデータを入れたのち、キーでソートする
    $turnRightArray = pivotArray($turnRightArray, $inputNumber);
    return $turnRightArray;
}


/*Controller-------------------------------------------------------*/

$message="";
$inputNumber[]="";
if(isset($_POST['inputNumber'])){
    $inputNumber=$_POST['inputNumber'];
}
if(isset($_POST['pivot'])){
    $pivot =$_POST['pivot'];
    if($pivot == 1){
        $message = "左回転";
        $resultArray = makeTurnLeftArray($inputNumber);
    }elseif($pivot == 3){
        $message = "右回転";
        $resultArray = makeTurnRightArray($inputNumber);
    }elseif($pivot != 1 && $pivot != 3){
        $message = "数値を正しく入力してください。";
        $resultArray = $inputNumber; 
    }else{
        header("Location:https://www.google.co.jp/");
    }
}

/*View-------------------------------------------------------*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題１２：右に９０度回転させて表示</title>
    </head>
    <body>
        <p>マス目の中に好きな数字を入れ、左回転なら「1」、右回転なら「3」と半角で入力してください。</p>
        <form action="pivotNumber.php" method="post">
        <table border="1">
<!--boxCountの数のべき乗数分、テキストボックスを作る。それぞれのテキストボックスのnameにinputNumberという配列を設定、この配列ににインクリメントで'1'スタートのキーを設定-->
<?php $x=1; ?>
<?php for($i=MIN; $i<=BOXCOUNT; $i++): ?>
            <tr>
<?php for($j=MIN; $j<=BOXCOUNT; $j++): ?>
                <td>
                    <input type="text" size="2" maxlength="2" name="inputNumber[<?php echo $x?>]" value="<?php if(isset($resultArray[$x])){echo $resultArray[$x];}?>">
                </td>
<?php $x++; ?>
<?php endfor;?>
            </tr>
<?php endfor;?>
        </table>
            <input type="text" name="pivot" size="1" maxlength="1">
            <input type="submit" value="回転">
        </form>
        <p><?php echo $message?></p>
    </body>
</html>