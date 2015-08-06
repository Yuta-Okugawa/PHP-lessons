<?php
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

$con = mysql_connect('localhost', 'root', 'root'); //user名とパスワードは各自
if(!$con){
    die('接続できません: ' . mysql_error());
}

$db_name = "postal_code"; //利用するデータベース名
mysql_select_db($db_name,$con);
$sql = "SELECT pref_name,city_name,add_name FROM reference_table WHERE postal_code = '".$_REQUEST['zip']."';";

$query = mysql_query($sql);

//取得した結果を取り出して連想配列に入れていく
$user= array();
while($row = mysql_fetch_object($query)){
    if(preg_match("/場合$/", $row->add_name) || preg_match("/一円$/", $row->add_name)){
        $row->add_name="";
    }
    $user[] = array(
    'pref_name' => $row->pref_name
    ,'city_name' => $row->city_name
    ,'add_name' => $row->add_name
    );
}
header('Content-type: application/json');
//jsonとして出力

print json_encode($user);
?>