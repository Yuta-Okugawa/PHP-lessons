<?php 

    error_reporting(-1);

    // 現在の年月を取得
    if(isset($_POST['year'])){
        $year = $_POST['year'];
        $month = $_POST['month'];
    } else {
        $year = date('Y');
        $month = date('n');
    }

    
     // 月末日を取得
    $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
    $calendar = array();
    $j = 0;

    function makeSelect($under,$upper){
        
        for($m = $under; $m <= $upper; $m++){
            echo "<option value='".$m."'>".$m."</option>";
        }
        echo "</select>";
    }

    // 月末日までループ
    for ($i = 1; $i < $last_day + 1; $i++) {
         // 曜日を取得
        $week = date('w', mktime(0, 0, 0, $month, $i, $year));
        // 1日の場合
        if ($i == 1) {
            // 1日目の曜日までをループ
            for ($s = 1; $s <= $week; $s++) {
                // 前半に空文字をセット
                $calendar[$j]['day'] = '';
                $j++;
            }
        }
        // 配列に日付をセット
        $calendar[$j]['day'] = $i;
        $j++;
        // 月末日の場合
        if ($i == $last_day) {
            // 月末日から残りをループ
            for ($e = 1; $e <= 6 - $week; $e++) {
                // 後半に空文字をセット
                $calendar[$j]['day'] = '';
                $j++;
            }
        }
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題9：カレンダーの表示</title>
    </head>
    <body> 
        <form action="calendar.php" method="post">
            <select name="year">
                <?php echo makeSelect(1900,2100); ?>
            <select name="month">
                <?php echo makeSelect(1,12); ?>
            <input type="submit">
        </form>
        <?php echo $year; ?>年<?php echo $month; ?>月のカレンダー
        <br>
        <br>
        <table>
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>

            <tr>
                <?php $cnt = 0; ?>
                <?php foreach ($calendar as $key => $value): ?>
                <td>
                    <?php $cnt++; ?>
                    <?php echo $value['day']; ?>
                </td>
                <?php if ($cnt == 7): ?>
            </tr>
            <tr>
                <?php $cnt = 0; ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        </table>
    </body>
</html>
