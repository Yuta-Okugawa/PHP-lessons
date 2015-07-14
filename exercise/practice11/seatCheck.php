<?php
error_reporting(4);
require_once("config.php");

if(array_sum($_POST['priority']) != 15){
    header("Location: seat_conf.php");
}



foreach($seat as $a){
    $emptySeat[$a] = BOOKED;
}

if(count($seat) == count($emptySeat)){
    $errmsg = "※満席です";
} else {
    $priority = $_POST['priority'];
    if(asort($priority)){
        foreach($priority as $b => $c){
            if($emptySeat[$b] == UNBOOKED){
                $emptySeat[$b] = GETSEAT;
                break;
            }
        }
    }
}




?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>動作確認</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <td colspan="6" align="center">予約状況</td>
            </tr>
                <?php makeSeatList($seatName,$colCount,$leftSeat); ?>
                <?php makeBookingList($emptySeat);?>
        </table>
        <p><?php echo $errmsg; ?></p>
    </body>
</html>