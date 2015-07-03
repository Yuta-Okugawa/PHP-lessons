<?php
$colCount = 5;
$leftSeat = 3;
$errmsg = "";

define("UNBOOKED", "○");
define("BOOKED", "×");
define("GETSEAT", "◎");


$seat = $_POST["seat"];
$seatName = array("1" => "A", "2" => "B", "3" => "C", "4" => "D", "5" => "E" );
$emptySeat = array ("1" => UNBOOKED, "2" => UNBOOKED, "3" => UNBOOKED, "4" => UNBOOKED, "5" => UNBOOKED);

function makeSeatList($array,$colCount,$LS){
    echo "<tr>";
    foreach($array as $a=>$b){
        echo "<th>".$b."</th>";
        if($a == $LS ){
            echo "<th rowspan='2'>(通路)</th>";
        } elseif($a == (($a%$colCount) == 0) ){
            echo "</tr>";
        }
    }
}
function makeBookingList($array){
    echo "<tr>";
    foreach($array as $a){
        echo "<td>".$a."</td>";
    }
    echo "</tr>";
}


?>