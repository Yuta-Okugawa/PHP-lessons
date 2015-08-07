<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題１5：お問い合わせフォーム（確認ページ）</title>
        <style type="text/css">  
            <!-- 
            table{ 
                border:1; 
                width:800px;
                margin:10px 25px;
            }
            th{
                width:200px;
                font-weight:normal;
                text-align:left;
                padding:5px;
                background-color:#cccccc;
                border:solid 1px #bbbbbb;
            }
            td{
                width:550px;
                padding:5px;
                border:solid 1px #bbbbbb;
            }
            .btn{
                text-align:center;
            }
            -->  
        </style>
    </head>
    <body>
        <form name="fm" action="index.php" method="post">
            <input type="hidden" name="name" value="<?php echo $name;?>">
            <input type="hidden" name="furi" value="<?php echo $furi;?>">
            <input type="hidden" name="mail" value="<?php echo $mail;?>">
            <input type="hidden" name="zipcode" value="<?php echo $zipcode;?>">
            <input type="hidden" name="pref" value="<?php echo $pref;?>">
            <input type="hidden" name="add1" value="<?php echo $add1;?>">
            <input type="hidden" name="add2" value="<?php echo $add2;?>">
            <input type="hidden" name="add3" value="<?php echo $add3;?>">
            <input type="hidden" name="toiawase" value="<?php echo $toiawase;?>">
            <input type="hidden" name="soshin" value="soshin">
            <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
            <table>
                <tr>
                    <th colspan="2">
                        <h2>入力確認</h2>
                    </th>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>
                        
                        <p><?php echo $name; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>名前フリガナ<br>（全角カタカナ）</th>
                    <td>
                        <p><?php echo $furi; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <p><?php echo $mail; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>郵便番号<br>(ハイフンなし)</th>
                    <td>
                        <p><?php echo $zipcode; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>都道府県</th>
                    <td>
                        <p><?php echo $pref; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>住所１(市区町村)</th>
                    <td>
                        <p><?php echo $add1; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>住所２(番地など)</th>
                    <td>
                        <p><?php echo $add2; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>住所３(マンション・建物名など)</th>
                    <td>
                        <p><?php echo $add3; ?></p>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>
                        <p><?php echo $toiawase; ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="btn">
                        <input type="submit" name="submit" value="送信"> 
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>