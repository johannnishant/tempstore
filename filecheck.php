<html>


<body>


	<?php 

		// This is a PHP Script to delete files & relevant symlinks which are older
		// than 3 days. 
		// A Cron process implemented by crontab runs this script every 5 minutes
		//Check Crontab by crontab -e

		// Enter your own DB Details
		$user =;
		$password =;
		$db =;
		$host =;
		$port =;


		$link = mysqli_init();
		if (!$link) {
		    die('mysqli_init failed');
		}


		if (!$link->real_connect($host,$user,$password,$db,$port)) {
		    die('Connect Error (' . mysqli_connect_errno() . ') '
		            . mysqli_connect_error());
		}

		$today=time();

		$sql= "SELECT `fileno`,`filename` FROM `files` WHERE DATEDIFF(now(),`dateofaddition`) >= 3";
					

		$result=mysqli_query($link,$sql) or die(mysqli_error($link));

		$count=mysqli_num_rows($result);

		while ($row = mysqli_fetch_row($result)) 
		{
		       echo $row[1];

		       $f1="../".$row[1]; // This is the Path for the Symlink
		       $f2="Storage/".$row[1]; // This is Path for actual file
		       $f3=$row[0]; // This if Fileno for deletion

		       if(is_link($f1))
		       	unlink($f1);

		       unlink($f2);

		    $sql= "DELETE FROM `tempstorage`.`files` WHERE `fileno`='$f3'";
					

			$result1=mysqli_query($link,$sql) or die(mysqli_error($link));
	  		// Usinge result1 as result is holding previous query
		}

		echo "The Number of Files which can be deleted is $count";

		?>

</body>

</html>


