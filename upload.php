<html>

<body>


	<?php

		$target_dir= "Storage/";
		$target_file= $target_dir . basename($_FILES["file_to_upload"]["name"]);
		$target_file_type= pathinfo($target_file,PATHINFO_EXTENSION);


		$upload_ok=1;

		if (file_exists($target_file)){

			echo "Filename already Exists";
			$upload_ok=0;
		}

		if ($_FILES["file_to_upload"]["size"] > 50000000){
			echo "File is larger than 50 Mb";
			$upload_ok=0;
		}

		if($upload_ok==1)
		{
			if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file))
				echo "The File " . basename($_FILES["file_to_upload"]["name"]) . " has been Successfully Upload!" ;

			else
				echo "There was an Error in Uploading your file!";
		}

	?>

</body>

</html>



	

		

