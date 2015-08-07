<?php
require_once("component.php");
startSession();


if(isset($_POST['kakunin']) || isset($_POST['soshin'])){
    
    //var_dump($_POST);    
    $name = h($_POST['name']);
    $furi = h($_POST['furi']);
    $mail = h($_POST['mail']);
    $zipcode = h($_POST['zipcode']);
    $pref = h($_POST['pref']);
    $add1 = h($_POST['add1']);
    $add2 = h($_POST['add2']);
    $add3 = h($_POST['add3']);
    $toiawase = $_POST['toiawase'];
    
    $errMsg = checkAll($_POST);
    
    if(checkError($errMsg)!=0){
        require("nyuryoku.php");
    }elseif(isset($_POST['kakunin'])){
        checkToken();
        require("kakunin.php");
    }elseif(isset($_POST['soshin'])){
        checkToken();
        require("soshin.php");
    }
}else{
    setToken();
    require("nyuryoku.php");
}

