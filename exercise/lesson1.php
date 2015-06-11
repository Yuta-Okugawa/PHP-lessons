<?php

    if(isset($_GET['index'])){
        echo "1<br>&nbsp;&nbsp;2<br>&nbsp;&nbsp;&nbsp;&nbsp;3<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5<br>";
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