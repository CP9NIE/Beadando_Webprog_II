<?php

if(isste($_POST['submit'])){

	$newFilename = $_POST['filename'];
	if(empty($_POST['$newFilename']) {
		$newFilename = "gallery";
	} 
	else 
	{
		//hogy kiküszöböljük a hibás fájlneveket....
		$newFilename = strtolower(str_replace(" ", "-", $newFilename));
	}
	
	$imageTitle = $_POST['filetitle'];
	$imageDesc = $_POST['filedesc'];
	
	$file = $FILES['file'];
	
	$filename = $file["name"];
	$filetype = $file["type"];
	$filenTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$filenSize = $file["size"];
	
	$fileExt = explode("." , $filename);
	$fileActualExt = strtolower(end($fileExt));
	
	//csak ezeket a formátumokat fogadjuk el...Ha nem ezeket adja meg valaki ,akkor hibát dob ki...
	
	$allowed = array("jpg", "jpeg","png");
	
	//A fájl méret nem lehet nagyobb 2000000 b-nál és a fájlnevek nem egyezhetnek, ezért generálunk egyedi azonosítót minden feltöltött képnek....
	if(in_array($fileActualExt,$allowed )) {
		if($fileError === 0) {
			if($filesize < 2000000){
				$imageFullname = $newFilename . "." . uniqid("",true) . "." . $fileActualExt;
				$fileDestination = "protected/gallery/" . $imageFullname;
				include_once "gallerydb";
				//HA üres akkor hibát dob ki
				if(empty($imageTitle) ||empty($imageDesc) ){
					header("Location: /gallery.php?upload=empty");
					exit();
				}
				//tényleges fájlfeltöltés
				else{
					$sql = "SELECT * FROM gallery;";
					$stmt = myqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						echo "SQL ERROR";
					}
					//képek sorrendje
					else{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowcount = mysqli_num_rows($result);
						$imageorder = $rowcount +1;
						
						//a kérdőjelek placeholderek....
						$sql= "INSERT INTO gallery (titleGallery , descGallery , imgFullNameGallery, orderGallery ) VALUES (?,?,?,?);";
						if(!mysqli_stmt_prepare($stmt,$sql)){
							echo "SQL ERROR";
						}
						else{
							mysqli_stmt_bind_param($stmt, "ssss", $imageTitle,$imageDesc,$imageFullname,$imageorder);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($filenTempName,$fileDestination );
							header("Location: /gallery.php?upload=success");
						}
					}
				}
			}
			else{
				echo "Too big size";
			exit();
			}
		}
		else{
			echo "Error";
			exit();
		}
		
	}
	else
	{
		echo "Acceptable fileformats: jpg, jpeg,png";
		exit();
	}
}

?>