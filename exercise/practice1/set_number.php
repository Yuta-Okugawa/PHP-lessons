<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題１</title>
    </head>
    <body>
        <p>秘密の数字を設定してください</p>
        <form action='select_number.php' method='post'>
            <script>
                document.write("<SELECT name='num'>");
                for(i=1; i<=20; i++) {
                    document.write("<OPTION value='"+i+"'>"+i+"</OPTION>");
                };
                document.write("</select>");        
            </script>
            <input type='submit' value='決定' name='index'>
            </select>
        </form>
    </body>
</html>