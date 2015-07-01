<?php
    // 都道府県とそれぞれの頭文字のアルファベットの配列
    $prefectures = array(
        "a" => array("青森県", "秋田県", "愛知県"),
        "b" => array(),
        "c" => array("千葉県"),
        "d" => array(),
        "e" => array("愛媛県"),
        "f" => array("福島県", "福井県", "福岡県"),
        "g" => array("群馬", "岐阜"),
        "h" => array("北海道", "兵庫県", "広島県"),
        "i" => array("岩手県", "茨城県", "石川県"),
        "j" => array(),
        "k" => array("神奈川県", "京都府", "香川県", "高知県", "熊本県", "鹿児島県"),
        "l" => array(),
        "m" => array("宮城県", "三重県", "宮崎県"),
        "n" => array("新潟県", "長野県", "奈良県", "長崎県"),
        "o" => array("大阪府", "岡山県", "大分県", "沖縄県"),
        "p" => array(),
        "q" => array(),
        "r" => array(),
        "s" => array("埼玉県", "静岡県", "滋賀県", "島根県", "佐賀県"),
        "t" => array("栃木県", "東京都", "富山県", "鳥取県", "徳島県"),
        "u" => array(),
        "v" => array(),
        "w" => array("和歌山県"),
        "x" => array(),
        "y" => array("山形県", "山梨県", "山口県"),
        "z" => array(),
    );
    
    // 頭文字が一致する都道府県名を表示する関数
    function resPrefs($array, $prefInitial){
        // 要素の個数を取得
        $count = count($array[$prefInitial]);
        // 配列がからだった場合
        if($count == 0){
            echo "該当なし<br>";
        // 要素の個数回配列を回す
        } else {
            for($i=0; $i<$count; $i++){
                echo $array[$prefInitial][$i]."<br>";
            }
        }
    }
    
?>