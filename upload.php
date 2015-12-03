<?php
	session_start(); // Session is started to support Session Variables
?>


<html>

	<body>


	<?php

		function gen_name($file_type) // This function provides a random 2 letter filename
		// for the uploaded file by checking with the db if filename already exists.
		{
			
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

			while(1)	
			{	
				$rand_name=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 2);

				$temp1=$rand_name.".".$target_file_type; // We use this as files are stored in db with extentions
	
				$sql= "SELECT * FROM `files` WHERE `filename`='$temp1'";
				// The SQL statement maybe vulnerable to Injection via filename 

				$result=mysqli_query($link,$sql) or die(mysqli_error($link));

				$count=mysqli_num_rows($result);

				if( $count == 0 )
					break;

				// If the Function cannot find filename, it enters an infinite loop
				// Implement future protection here

			}

			// The filename and timestamp are inserted to db

			$current = time();
			$file=$rand_name.".".$file_type;
			$sql= "INSERT INTO `tempstorage`.`files` (`filename`, `dateofaddition`) VALUES ('$file',FROM_UNIXTIME(".$current.")); ";
			$result=mysqli_query($link,$sql) or die(mysqli_error($link)); 

			return $rand_name;

		}

		$target_dir= "Storage/";
		$target_file= $target_dir . basename($_FILES["file_to_upload"]["name"]);
		$target_file_type= pathinfo($target_file,PATHINFO_EXTENSION);
		$filename=gen_name($target_file_type);
		$target_file= $target_dir . $filename . "." . $target_file_type;


		$upload_ok=1;

		if ($_FILES["file_to_upload"]["size"] > 500000000) // FileSize Check 
		{
			echo "File is larger than 500 Mb"; 
			$upload_ok=0;
		}

		// Future check for scripts and other extentions 

		if($upload_ok==1)
		{
			if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file))
			{	
				$temp=$filename . "." . $target_file_type;
				$_SESSION["filelink"]=$temp;
				?>
  				<script>window.location = 'upload_suc.php';</script>
				<?php 
			}

			else
				echo "There was an Error in Uploading your file!";
		}

		$wat = symlink("./ts/".$target_file,'../'.$filename.".".$target_file_type) or die("SYMLINK FAILED");
		// Symlink is created here
	?>

	</body>

</html>



	

		

