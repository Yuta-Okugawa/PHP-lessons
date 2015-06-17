<?php
    session_start();

    if(!isset($_POST['num']) && !isset($_SESSION['num'])){
        header("Location:set_number.php");
    }

    if(!isset($_SESSION['num']) && isset($_POST['num'])){
        $_SESSION['num'] = $_POST['num'];
    } elseif (isset($_SESSION['num']) && isset($_POST['num'])){
        $_SESSION['num'] = $_POST['num'];
    }      
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題1</title>
    </head>
    <body>
         <p>秘密の数字を当ててください。</p>
        <form action='result_number.php' method='post'>
            <script>
                document.write("<SELECT name='selectNum'>");
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