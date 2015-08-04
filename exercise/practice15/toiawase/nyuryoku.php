<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題１5：お問い合わせフォーム（7桁の郵便番号を入力すると、都道府県、町名を表示する）</title>
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
        <script type="text/javascript">
        
                // XMLHttpRequestオブジェクトを取得するためのユーザ定義関数;
            function getXHR(){
                var req;
                try{
                    req = new XMLHttpRequest();
                }catch(e){
                    try{
                        new ActiveXObject('Msxml2.XMLHTTP');
                    }catch(e){
                        new ActiveXObject('Microsoft.XMLHTTP');
                    }
                }
                return req;
            }
            
                //送信ボタンクリック時の実行されるイベントハンドラ
            function asyncSend(){
                var req = getXHR();
                //非同期通信時の処理（コールバック関数）を定義
                req.onreadystatechange = function(){
                    //var result = document.getElementById('result');
                    var pref = document.getElementById('pref');
                    var add1 = document.getElementById('add1');
                    var add2 = document.getElementById('add2');
                    //console.log(add1.value);
                    //add1
                    // -> value 属性の中身
                    // -> type 属性の中身
                    // -> id 属性の中身
                    // -> name 属性の中身
                    if(req.readyState == 4){//通信の完了時
                        if(req.status == 200){//通信が成功したとき
                            var data = JSON.parse(req.responseText); 
                            console.log(data[0].pref_name);
                            pref.value = data[0].pref_name;
                            add1.value = data[0].city_name;
                            add2.value = data[0].add_name;
                            result.innerHTML = "";
                        }else{//通信が失敗したとき
                            result.innerHTML = "サーバーエラーが発生しました。";
                        }
                    }else{// 通信が完了する前
                        result.innerHTML = "通信中・・・";
                    }
                }
                // サーバとの非同期通信を開始
                req.open('GET', 'search_db.php?zip='+
                         encodeURIComponent(document.fm.zip.value), true);
                req.send(null);
            }
        </script>
    </head>
    <body>
<!--===================お問い合わせフォーム=====================-->
        <form name="fm" action="toiawase.php" method="post">
            <input type="hidden" name="checkFirst" value="check">
            <table>
                <tr>
                    <th colspan="2">
                        <h2>お問い合わせ</h2>
                        <p>※は必須内容</p>
                    </th>
                </tr>
                <tr>
                    <th>名前※</th>
                    <td>
                        <input type="text" name="name" value="<?php if(isset($name)){echo $name;}?>"><br>
                        <?php echo $nameResult; ?>
                    </td>
                </tr>
                <tr>
                    <th>名前フリガナ<br>（全角カタカナ）※</th>
                    <td>
                        <input type="text" name="furi" value="<?php if(isset($furi)){echo $furi;}?>"><br>
                        <?php echo $furiResult; ?>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス※</th>
                    <td>
                        <input type="text" name="mail" size="50" value="<?php if(isset($mail)){echo $mail;}?>"><br>
                        <?php echo $mailResult; ?>
                    </td>
                </tr>
                <tr>
                    <th>郵便番号<br>(ハイフンなし)※</th>
                    <td>
                        <input type="text" name="zipcode" id="zip" value="<?php if(isset($zipcode)){echo $zipcode;}?>">
                        <input type="button" name="search" value="住所検索" onclick="asyncSend()"><br>
                        <?php echo $zipResult; ?>
                    </td>
                </tr>
                <tr>
                    <th>都道府県※</th>
                    <td>
                        <input type="text" name="pref" size="60" id="pref" value="<?php if(isset($pref)){echo $pref;}?>"><br>
                        <?php echo $prefResult; ?>
                    </td>
                </tr>
                <tr>
                    <th>住所１(市区町村)※</th>
                    <td>
                        <input type="text" name="add1" size="60" id="add1" value="<?php if(isset($add1)){echo $add1;}?>" ><br>
                        <?php echo $add1Result; ?>
                    </td>
                </tr>
                <tr>
                    <th>住所２(番地など)※</th>
                    <td>
                        <input type="text" name="add2" size="60" id="add2" value="<?php if(isset($add2)){echo $add2;}?>"><br>
                        <?php echo $add2Result; ?>
                    </td>
                </tr>
                <tr>
                    <th>住所３(マンション・建物名など)</th>
                    <td>
                        <input type="text" name="add3" size="60" id="add3" value="<?php if(isset($add3)){echo $add3;}?>">
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td><textarea rows="6" cols="70" name="toiawase"><?php if(isset($toiawase)){echo $toiawase;}?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" class="btn">
                        <input type="submit" name="submit" value="確認"> 
                    </td>
                
                </tr>
            </table>
        </form>
        <div id="result"></div>
    </body>
</html>