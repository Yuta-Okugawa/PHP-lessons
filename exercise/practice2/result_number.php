<?php
    session_start();

    if(!isset($_SESSION['num'])){
        header("Location:set_number.php");
    }

    if(!isset($_POST['selectNum'])){
        header("Location:select_number.php");
    }

    $num = $_SESSION['num'];
    $selectNum = $_POST['selectNum'];
    $cal = abs($num - $selectNum);
    
    if($cal == 0){
        $index =1;
        $result = "当たり！";
        session_destroy();
    } elseif($cal == 1){
        $index =0;
        $result = "おしい！";
    } else {
        $index = 0;
        $result = "はずれ！";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>問題1</title>
    </head>
    <body>
         <?php echo $result; ?><br>
        <script>
            if(<?php echo $index; ?> == 1){
                document.write("<a href='set_number.php'>"+"もう一度遊ぶ"+"</a>")
            } else {
                document.write("<a href='select_number.php'>"+"選び直す"+"</a>")
            }
        </script>
    </body>
</html>