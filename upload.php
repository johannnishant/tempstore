<html>

<body>


	<?php

		function gen_name($file_type)
		{
				

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


				while(1)	
				{	
					$rand_name=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 2);
		

					$sql= "SELECT * FROM `files` WHERE `filename`='$rand_name'";
					

					$result=mysqli_query($link,$sql) or die(mysqli_error($link));

					// echo $result;

					$count=mysqli_num_rows($result);

					if( $count == 0 )
						break;

				}


				$current = time();
				$file=$rand_name.".".$file_type;
				$sql= "INSERT INTO `tempstorage`.`files` (`filename`, `dateofaddition`) VALUES ('$file',FROM_UNIXTIME(".$current.")); ";
				$result=mysqli_query($link,$sql) or die(mysqli_error($link)); 

				return $rand_name;

		}

		$target_dir= "Storage/";
		// $target_file= $target_dir . basename($_FILES["file_to_upload"]["name"]);
		$target_file= $target_dir . basename($_FILES["file_to_upload"]["name"]);
		$target_file_type= pathinfo($target_file,PATHINFO_EXTENSION);
		$filename=gen_name($target_file_type);
		$target_file= $target_dir . $filename . "." . $target_file_type;


		$upload_ok=1;

		if ($_FILES["file_to_upload"]["size"] > 50000000){
			echo "File is larger than 50 Mb";
			$upload_ok=0;
		}

		if($upload_ok==1)
		{
			if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file))
				echo "The File has been Successfully Upload!" ;

			else
				echo "There was an Error in Uploading your file!";
		}

		$wat = symlink("./ts/".$target_file,'../'.$filename.".".$target_file_type) or die("SYMLINK FAILED");

	?>

</body>

</html>



	

		

