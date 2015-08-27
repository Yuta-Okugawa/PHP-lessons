<?php
/**
 * /app/View/Toiawase/index.ctp
 */
echo $this->Html->script('getAddress', array('inline' => false));
echo $this->Form->create(false);
echo $this->Form->input(
    'name',
    array('label' => '名前※','div' => false)
);
echo $this->Form->error('Validate.name');
echo $this->Form->input(
    'furi',
    array('label' => '名前フリガナ（全角カタカナ）※','div' => false)
);
echo $this->Form->error('Validate.furi');
echo $this->Form->input(
    'mail',
    array('label' => 'メールアドレス※','div' => false)
);
echo $this->Form->error('Validate.mail');
echo $this->Form->input(
    'zipcode',
    array('label' => '郵便番号（ハイフンなし）※','div' => false)
);
echo $this->Form->button('住所を自動入力する', array('onclick'=>'asyncSend()','type'=>'button' ));
echo $this->Form->error('Validate.zipcode');
echo "<div id='result'></div>";
echo $this->Form->input(
    'pref',
    array('label' => '都道府県※','div' => false)
);
echo $this->Form->error('Validate.pref');
echo $this->Form->input(
    'city',
    array('label' => '市区町村※','div' => false)
);
echo $this->Form->error('Validate.city');
echo $this->Form->input(
    'add1',
    array('label' => '番地など※','div' => false)
);
echo $this->Form->error('Validate.add1');
echo $this->Form->input(
    'add2',
    array('label' => 'マンション・建物名など','div' => false)
);
echo $this->Form->error('Validate.add2');
echo $this->Form->label('inq','お問い合わせ内容');
echo $this->Form->textarea('inq');
echo $this->Form->error('Validate.inq');
echo $this->Form->end('確認画面に進む');

?>

