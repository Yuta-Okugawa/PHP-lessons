<?php
    
    $i = 1;
    $num = "";
    
    if(isset($_GET['index'])){
        if($i <= 5){
            echo "$i"."$num";
            ++$i;
            $num = "$num"."&nbsp;&nbsp;"."<br>";
        }
 
    } else {
        echo "<form action='test.php' method='get'>
            <input type='submit' name='index' value='実行'>
        </form>";
    }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>test</title>
	</head>
	<body>
        
		
	</body>
</html>