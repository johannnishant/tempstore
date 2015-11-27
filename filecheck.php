<html>


<body>


	<?php 


		$user = 'tempstorage';
		$password = 'mothership()';
		$db = 'tempstorage';
		$host = '127.0.0.1';
		$port = 3306;


		$link = mysqli_init();
		if (!$link) {
		    die('mysqli_init failed');
		}


		if (!$link->real_connect($host,$user,$password,$db,$port)) {
		    die('Connect Error (' . mysqli_connect_errno() . ') '
		            . mysqli_connect_error());
		}

		$today=time();

		$sql= "SELECT `fileno`,`filename` FROM `files` WHERE DATEDIFF(now(),`dateofaddition`) >= 7";
					

		$result=mysqli_query($link,$sql) or die(mysqli_error($link));

		$count=mysqli_num_rows($result);

		while ($row = mysqli_fetch_row($result)) 
		{
		       echo $row[1];

		       $f1="../".$row[1];
		       $f2="Storage/".$row[1];
		       $f3=$row[0];

		       if(is_link($f1))
		       	unlink($f1);

		       unlink($f2);

		    $sql= "DELETE FROM `tempstorage`.`files` WHERE `fileno`='$f3'";
					

			$result1=mysqli_query($link,$sql) or die(mysqli_error($link));


		  
		}


		echo "The count is $count";

		?>

</body>

</html>


