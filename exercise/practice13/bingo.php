<?php
error_reporting(-1);
/*-------------------------------*/
$bingo = array();

if (isset($_POST['seed'])){
    $seed=$_POST['seed'];
}else{
    $seed=time();
}

if(isset($_POST['order'])){
    $order=$_POST['order']+1;
}else{
    $order=1;
}
for ($i=0; $i<5; $i++) {
	$numbers = range($i*15+1, $i*15+15);
    srand($seed);
	shuffle($numbers);
	$bingo[$i] = array_slice($numbers, 0, 5);
}


$numbers = range(1,75);
srand($seed);
shuffle($numbers);
$x=1;
foreach($numbers as $value){
    $numbers[$x]=$value;
    $x++;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題１３：ビンゴゲーム　＋　ビンゴゲーム実況中継</title>
    </head>
    <body>
        <form method='POST'>
            <font size='50px'><?php echo $numbers[$order]; ?></font><br>
<?php if ($order<=75){ ?>
                <input type='hidden' name='seed' value='<?php echo $seed; ?>'>
                <input type='hidden' name='order' value='<?php echo $order; ?>'>
                <input type='submit' value='ビンゴ'>
<?php } else { ?>
                <p>ビンゴは終了しました</p><br>
                <input type='submit' value='リセット'>
<?php } ?>
        
            <p>既出番号</p>
            <p>
<?php for($i=1;$i<$order;$i++): ?>
        <?php echo '"'.$numbers[$i].'"'; ?>
<?php if($i == ($i%10==0)): ?>
            <br>
<?php endif; ?>
<?php endfor; ?>
            </p>
<?php $hiddenNumber = array_slice($numbers, 1, $order); ?>
<!------------------------------------------------------------------->
            <table border="1" >
                <tr>
                    <th>B</th><th>I</th><th>N</th><th>G</th><th>O</th>
                </tr>
<?php $tate=0; ?>
<?php $yoko=0; ?>
<?php for($j=0; $j<5; $j++): ?>
                <tr class="<?php echo $j?>">

<?php for($k=0; $k<5; $k++): ?> 
<?php if($j==2 && $k==2){ ?>
<?php $yoko++; ?>
<?php $tate++; ?>

                    <td bgcolor=gray id="<?php echo $k; ?>"></td> 
<?php }elseif(!array_search($bingo[$k][$j], $hiddenNumber)){ ?>
                    <td align="center" id="<?php echo $k; ?>"><?php echo $bingo[$k][$j];?></td>
<?php }else{?>
<?php $yoko++; ?>
<?php $tate++; ?>

                    <td align="center" bgcolor=gray id="<?php echo $k; ?>"><?php echo $bingo[$k][$j];?></td>
<?php } ?>


<?php endfor; ?>
                </tr>
<?php
if($yoko==4){
    echo "リーチ!";
}elseif($yoko==5){
    echo "BINGO!";
}                
                    
?>
<?php $yoko=0; ?>
<?php endfor; ?>

            </table>
        </form>
    </body>
</html>