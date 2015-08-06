<?php
require_once("component.php");

if(isset($_POST['kakunin']) || isset($_POST['soshin'])){
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $furi = htmlspecialchars($_POST['furi'], ENT_QUOTES);
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
    $zipcode = htmlspecialchars($_POST['zipcode'], ENT_QUOTES);
    $pref = htmlspecialchars($_POST['pref'], ENT_QUOTES);
    $add1 = htmlspecialchars($_POST['add1'], ENT_QUOTES);
    $add2 = htmlspecialchars($_POST['add2'], ENT_QUOTES);
    $add3 = htmlspecialchars($_POST['add3'], ENT_QUOTES);
    $toiawase = htmlspecialchars($_POST['toiawase'], ENT_QUOTES);
    $errMsg = checkAll($_POST);
    
    if(checkError($errMsg)!=0){
        require("nyuryoku.php");
    }elseif(isset($_POST['kakunin'])){
        require("kakunin.php");
    }elseif(isset($_POST['soshin'])){
        require("soshin.php");
    }
}else{
    require("nyuryoku.php");
}

