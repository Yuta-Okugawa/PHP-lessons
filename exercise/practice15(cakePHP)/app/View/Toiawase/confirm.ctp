<?php
/**
 * /app/View/Toiawase/check.ctp
 */

$inputedData = $this->Session->read('inputedData');

echo "名前：".$inputedData['name']."<br>";
echo "フリガナ：".$inputedData['furi']."<br>";
echo "メールアドレス：".$inputedData['mail']."<br>";
echo "郵便番号：".$inputedData['zipcode']."<br>";
echo "都道府県名：".$inputedData['pref']."<br>";
echo "市区町村：".$inputedData['city']."<br>";
echo "住所１：".$inputedData['add1']."<br>";
echo "住所２：".$inputedData['add2']."<br>";
echo "問い合わせ内容：".$inputedData['inq']."<br>";
echo $this->Form->create(false);
echo $this->Form->input('inputedData', array('type'=>'hidden'));
echo $this->Form->end("送信");