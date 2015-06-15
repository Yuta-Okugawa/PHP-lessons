<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>test</title>
	</head>
	<body>
        <?php
    
            error_reporting(-1);

   
            $num = "&nbsp;&nbsp;";

            if(isset($_GET['index'])){
                for($i = 1; $i <= 5; $i++){
                     
                    echo "$i"."<br>"."$num";

                    $num = "$num"."&nbsp;&nbsp;";
                
                }

            } else {
                echo "<form action='test.php' method='get'>
                    <input type='submit' name='index' value='実行'>
                </form>";
            }
        ?>
		
	</body>
</html>