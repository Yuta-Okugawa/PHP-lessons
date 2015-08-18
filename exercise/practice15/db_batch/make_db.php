<?php
error_reporting(-1);
header("Content-Type: text/html; charset=UTF-8");
ini_set("max_execution_time",10000);

//読み込む郵便番号ファイルパス
define("FILE", "KEN_ALL.CSV");
//使うDB名
define("DB", "postal_code");
//一時的テーブル名
define("TMPTABLE", "tmp_table");
//参照、検索用本番テーブル名
define("RFTABLE","reference_table");

$con = mysql_connect("localhost", "root", "root") or die("接続に失敗しました");


///////////////////////////////////////
//
//データ読み込み
//
///////////////////////////////////////
//ファイルを読み込む
$data = file_get_contents(FILE);
if(!$data){
    die('ファイルの読み込みに失敗しました');
}
//文字コード変換
$data = mb_convert_encoding($data, 'UTF-8', 'SJIS');
//半角カナを全角カナに変換
$data = mb_convert_kana($data,'KV');

$lines = explode("\r\n", $data);
array_pop($lines);
foreach($lines as $line){
    $records[] = str_getcsv($line);
}
//print_r($records);
/////////////////////データ読み込み//////////////////////


//////////////////////////////////////////////
//
//一時的なテーブルがあればデータを削除し新たにデータINSERT、無ければ作成する
//
//////////////////////////////////////////////

if (!table_check(DB,TMPTABLE,$con)) {
    $sql1 = "CREATE TABLE ".TMPTABLE
    ." ("
    . "`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT'ID',"  
    . "`postal_code` VARCHAR(7) NOT NULL COMMENT'郵便番号',"  
    . "`pref_furi` VARCHAR(50) NOT NULL COMMENT'カタカナ',"
    . "`city_furi` VARCHAR(100) NOT NULL COMMENT'カタカナ',"
    . "`add_furi` VARCHAR(100) NULL COMMENT'カタカナ',"
    . "`pref_name` VARCHAR(50) NOT NULL COMMENT'漢字',"
    . "`city_name` VARCHAR(100) NOT NULL COMMENT'漢字',"
    . "`add_name` VARCHAR(100) NULL COMMENT'漢字'"
    .");";
    $rs=mysql_query($sql1)or die(mysql_error());
    //mysql_close($con);
    echo "一時的テーブルを作成しました。\n";
}else{
    $sql2 = "DELETE FROM ".TMPTABLE.";";
    mysql_query($sql2)or die(mysql_error());
    foreach($records as $key => $record){
        $sql3 = "INSERT INTO ".TMPTABLE 
        ." (postal_code, pref_furi, city_furi, add_furi, pref_name, city_name, add_name)"
        ." VALUES ";
        $sql3.= "(";
        for($i=2; $i<=8; $i++){
            if($i == 8){
                $sql3.= "'".$record[$i]."'";
            }else{
                $sql3.= "'".$record[$i]."',";
            }
        }
        $sql3.= ");";
        mysql_query($sql3)or die(mysql_error());
    }
    echo "一時的テーブルへのデータ挿入が完了しました\n";
}
///////////////////一時的テーブル作成 and データ入力////////////////////

///////////////////////////////////////////////////////
//
//参照用テーブルがあればデータを削除し、一時的テーブルからデータコピー、無ければ作成する
//
///////////////////////////////////////////////////////
if (!table_check(DB,RFTABLE,$con)) {
    $sql4 = "CREATE TABLE ".RFTABLE
    ." ("
    . "`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT'ID',"  
    . "`postal_code` VARCHAR(7) NOT NULL COMMENT'郵便番号',"  
    . "`pref_furi` VARCHAR(50) NOT NULL COMMENT'カタカナ',"
    . "`city_furi` VARCHAR(100) NOT NULL COMMENT'カタカナ',"
    . "`add_furi` VARCHAR(100) NULL COMMENT'カタカナ',"
    . "`pref_name` VARCHAR(50) NOT NULL COMMENT'漢字',"
    . "`city_name` VARCHAR(100) NOT NULL COMMENT'漢字',"
    . "`add_name` VARCHAR(100) NULL COMMENT'漢字'"
    .");";
    $rs=mysql_query($sql4)or die(mysql_error());
    mysql_close($con);
}else{
    $sql8 = "BEGIN;";
    mysql_query($sql8);
    $sql5 = "DELETE FROM ".RFTABLE.";";
    $rs=mysql_query($sql5);
    if(!$rs){
        $sql7 = "ROLLBACK;";
        mysql_query($sql7);
        mysql_close($con);
        echo "参照用DBのデータ削除に失敗しました\n";
        exit();
    }
    $sql6 = "INSERT INTO ".RFTABLE." SELECT * FROM ".TMPTABLE.";";
    $rs=mysql_query($sql6);
    if(!$rs){
        $sql7 = "ROLLBACK;";
        mysql_query($sql7);
        mysql_close($con);
        echo "参照用DBへのコピーが失敗しました \n";
        exit();
    }
    $sql7 = "COMMIT;";
    mysql_query($sql7);
    mysql_close($con);
    echo "参照用DBへのコピーが成功しました \n";
    exit();
}
////////////////////テーブルコピー//////////////////////

//////////////////テーブルが有るかないかチェックする関数////////////////////
function table_check($dbname,$tablename,$con){
    $rs = mysql_list_tables($dbname,$con);
    while($arr_row = mysql_fetch_row($rs)) {
        if(in_array($tablename,$arr_row)) {
            return true;
        }
    }
    return false;
}

