<?php
$name = $_POST['name'];
$furi = $_POST['furi'];
$mail = $_POST['mail'];
$zipcode = $_POST['zipcode'];
$pref = $_POST['pref'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$add3 = $_POST['add3'];
$toiawase = $_POST['toiawase'];



$c=0;
if($name == ""){
    $nameResult="名前は必ず入力してください";
    $c++;
}
//
if($furi == ""){
    $furiResult="フリガナは必ず入力してください";
    $c++;
}else{
    if(!preg_match("/\A[\x{30A1}-\x{30FC}().-]+\z/u",$furi)){
        $furiResult="フリガナは全角カタカナのみで入力してください";
        $c++;
    }
}
//
if($mail == ""){
    $mailResult="メールアドレスは必ず入力してください";
    $c++;
}else{
    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$mail)){
        $mailResult="";
        $c++;
    }
}
//
if($zipcode == ""){
    $zipResult="郵便番号は必ず入力してください";
    $c++;
}else{
    if(!preg_match("/^\d{7}$/", $zipcode)){
        $zipResult="半角で七ケタ入力してください";
        $c++;
    }
}
//
if($pref == ""){
    $prefResult="県名は必ず入力してください";
    $c++;
}
//
if($add1 == ""){
    $add1Result="住所は必ず入力してください";
    $c++;
}
//
if($add2 == ""){
    $add2Result="住所は必ず入力してください";    
    $c++;
}

if($c==0){
    require("soshin.php");
}else{
    require("nyuryoku.php");
}
