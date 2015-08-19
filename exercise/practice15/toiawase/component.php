<?php

//セッションスタート
function startSession(){
    session_start();
}

//トークンをセッションにセット
function setToken(){
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
}

//トークンをセッションから取得
function checkToken(){
    //セッションが空か生成したトークンと異なるトークンでPOSTされたときは不正アクセス
    if(empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])
      ){
        echo '不正なPOSTが行われました';
        //echo $_SESSION['token'];
        //echo $_POST['token'];
        exit;
    }
}
//htmlspecialchars
function h($s){
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

//値に要素が入っているかどうかチェックする関数。入っていればTRUE
function checkEmpty($value){
    if($value==""){
        return "※印は必須項目です。";
    }
}
//名前が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkName($value){
    if(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,10}$/u",$value)){
        return "名前は全角で10文字以内で入力してください。";
    }
}
//フリガナが正しく入力されているかチェックする関数。間違っていたらTRUE
function checkFuri($value){
    if(!preg_match("/\A[\x{30A1}-\x{30FC}().-]{0,10}$/u",$value)){
        return "フリガナは全角カタカナで10文字以内で入力してください。";
    }
}
//メールアドレスが正しく入力されているかチェックする関数。間違っていたらTRUE
function checkMail($value){
    if(!preg_match("/^[0-9a-z_.\/?-]{1,64}@([0-9a-z-]{1,24}+\.){1,5}[0-9a-z-]{1,25}$/",$value)){
        return "メールアドレスは半角英数字で正しく入力してください。";
    }
}
//郵便番号が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkZip($value){
    if(!preg_match("/^\d{7}$/",$value)){
        return "郵便番号は半角で７ケタ入力してください。";
    }
}
//都道府県名が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkPref($value){
    if(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,5}$/u",$value)){
        return "都道府県名は正しく入力してください。";
    }
}
//住所１が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkAdd1($value){
    if(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,10}$/u",$value)){
        return "住所１は全角で10文字以内で入力してください。";
    }
}
//住所２が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkAdd2($value){
    if(!preg_match("/^[ぁ-んァ-ヶー一-龠]{0,20}$/u",$value)){
        return "住所２は全角で20文字以内で入力してください。";
    }
}
//住所３が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkAdd3($value){
    if(!preg_match("/^.{0,20}$/u",$value)){
        return "住所３は20文字以内で入力してください。";
    }
}
//問い合わせ内容が正しく入力されているかチェックする関数。間違っていたらTRUE
function checkToiawase($value){
    if(!preg_match("/^.{0,1000}$/u",$value)){
        return "お問い合わせ内容は1000文字以内で入力してください。";
    }
}

//ヴァリデーションチェックをして、引っかかったところをエラーメッセジの配列にして返す
function checkAll($array){
    $errMsg =[];
    foreach($array as $key => $value){
        if($key == 'name'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkName($value);
        }elseif($key == 'furi'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkFuri($value);
        }elseif($key == 'mail'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkMail($value);
        }elseif($key == 'zipcode'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkZip($value);
        }elseif($key == 'pref'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkPref($value);
        }elseif($key == 'add1'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkAdd1($value);
        }elseif($key == 'add2'){
            $errMsg[$key] = checkEmpty($value);
            $errMsg[$key] .= checkAdd2($value);
        }elseif($key == 'add3'){
            $errMsg[$key] = checkAdd3($value);
        }elseif($key == 'toiawase'){
            $errMsg[$key] = checkToiawase($value);
        }
    }
    return $errMsg;
}

function checkError($resultMsg){
    $counter=0;
    foreach($resultMsg as $value){
        if($value!=""){
            $counter++;
        }
    }
    return $counter;
}

