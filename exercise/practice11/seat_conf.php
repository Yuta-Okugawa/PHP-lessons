<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題11:新幹線の座席を選ぶ（設定）</title>
    </head>
    <body>
        <form action="seatCheck.php" method="post" name="seatTable">
            <table border="1">
                <tr>
                    <td colspan="6" align="center">予約設定(予約済みの席を選択)</td>
                </tr>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th rowspan="2">（通路）</th>
                    <th>D</th>
                    <th>E</th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="seat[]" value="1">
                    </td>
                    <td>
                        <input type="checkbox" name="seat[]" value="2">
                    </td>
                    <td>
                        <input type="checkbox" name="seat[]" value="3">
                    </td>
                    <td>
                        <input type="checkbox" name="seat[]" value="4">
                    </td>
                    <td>
                        <input type="checkbox" name="seat[]" value="5">
                    </td>
                </tr>
            </table>
            <table border="1">
                <tr>
                    <td colspan="6" align="center">優先順位(値を重複させないでください)</td>
                </tr>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th rowspan="2">（通路）</th>
                    <th>D</th>
                    <th>E</th>
                </tr>
                <tr>
                    <?php for($i=1; $i<=5; $i++):?>
                    <td>
                        <select name="priority[<?php echo $i ?>]" value="<?php echo $i; ?>">
                            <?php for($j=1; $j<=5; $j++): ?>
                            <option value="<?php echo $j.'">'.$j; ?></option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <?php endfor; ?>
                </tr>
            </table>
            
            <input type="submit">
        </form>
    </body>
</html>