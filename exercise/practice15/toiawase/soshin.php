<?php
error_reporting(-1);
$contents ="お問い合わせ内容\r\n" 
    ."名前：".$name."\r\n"
    ."フリガナ：".$furi."\r\n"
    ."mail：".$mail."\r\n"
    ."郵便番号：".$zipcode."\r\n"
    ."都道府県：".$pref."\r\n"
    ."住所１：".$add1."\r\n"
    ."住所２：".$add2."\r\n"
    ."住所３：".$add3."\r\n"
    ."問い合わせ内容：".$toiawase."\r\n";
$message="";
if(mb_send_mail($mail, 'お問い合わせ内容',$contents)){
    $message="送信が完了しました";
}else{
    $message="送信に失敗しました";
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>問題１5：お問い合わせフォーム（完了画面）</title>
    </head>
    <body>
        <p><?php echo $message; ?></p>
    </body>
</html>