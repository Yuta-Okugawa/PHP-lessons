<?php
error_reporting(-1);

if(!isset($_POST{'seat'}) || array_sum($_POST['priority']) != 15){
    header("Location: seat_conf.php");
}



define("UNBOOKED", "○");
define("BOOKED", "×");
define("GETSEAT", "◎");
$errmsg = "";

$seat = $_POST["seat"];
$emptySeat = array ("1" => UNBOOKED, "2" => UNBOOKED, "3" => UNBOOKED, "4" => UNBOOKED, "5" => UNBOOKED);


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
        <title>問題11:新幹線の座席を選ぶ</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <td colspan="6" align="center">予約状況</td>
            </tr>
            <tr>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th rowspan="2">(通路)</th>
                <th>D</th>
                <th>E</th>
            </tr>
            <tr>
                <?php foreach ($emptySeat as $value ): ?>
                <td>
                    <?php echo $value; ?>
                </td>
                <?php endforeach; ?>
                
            </tr>
        </table>
        <p><?php echo $errmsg; ?></p>
    </body>
</html>