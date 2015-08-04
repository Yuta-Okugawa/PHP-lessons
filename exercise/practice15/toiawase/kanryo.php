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
    }elseif(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,10}$/u",$name)){
        $nameResult="名前は全角で入力してください";
        $c++;
    }
    //
    if($furi == ""){
        $furiResult="フリガナは必ず入力してください";
        $c++;
    }elseif(!preg_match("/\A[\x{30A1}-\x{30FC}().-]{0,10}$/u",$furi)){
        $furiResult="フリガナは全角カタカナのみで入力してください";
        $c++;
        
    }
    //
    if($mail == ""){
        $mailResult="メールアドレスは必ず入力してください";
        $c++;
    }elseif(!preg_match("|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|",$mail)){
        $mailResult="メールの値が正しくありません。";
        $c++;    
    }
    //
    if($zipcode == ""){
        $zipResult="郵便番号は必ず入力してください";
        $c++;
    }elseif(!preg_match("/^\d{7}$/", $zipcode)){
        $zipResult="半角で七ケタ入力してください";
        $c++;    
    }
    //
    if($pref == ""){
        $prefResult="県名は必ず入力してください";
        $c++;
    }elseif(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,5}$/u",$pref)){
        $prefResult="都道府県名は正しく入力してください";
        $c++;
    }
    //
    if($add1 == ""){
        $add1Result="住所は必ず入力してください";
        $c++;
    }elseif(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,10}$/u",$add1)){
        $add1Result="住所は正しく入力してください";
        $c++;
    }
    //
    if($add2 == ""){
        $add2Result="住所は必ず入力してください";    
        $c++;
    }elseif(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,20}$/u",$add2)){
        $add2Result="住所は正しく入力してください";
        $c++;
    }
    
    if($add3 != "" && !preg_match("/^.{0,20}$/u",$add3)){
        $pResult="住所は正しく入力してください";
        $c++;
    }
    
    if($toiawase != "" && !preg_match("/^.{0,1000}$/u",$add3)){
        $prefResult="お問い合わせ内容は1000文字までで入力してください";
        $c++;
    }
if($c==0){
    require("soshin.php");
}else{
    require("nyuryoku.php");
}
