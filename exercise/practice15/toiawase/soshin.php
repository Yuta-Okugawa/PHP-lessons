<?php
$message="";
if(mb_send_mail($mail, 'TEST',$toiawase)){
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