<?php
	$_SESSION['username']= "Admin";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Purrfect pics</title>
</head>
<body>
<main>

<section class="gallery-links">
	<div class="wrapper">
	<h2>Gallery</h2>
	
	<div class="gallery-container">
			<?php
			include_once 'gallerydb.php';
			
			$sql= "SELECT * FROM gallery ORDER BY orderGallery DESC";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "CONNECTION ERROR";
			}
			else{
				mysqli_stmt_execute($stmt);
				$result= mysqli_stmt_get_result($stmt);
				
				while($row = mysqli_fetch_assoc($result)){
				
					echo '<a href="#">
					<div style="background-image: url(/gallery/'.$row["imgFullNameGallery"].');" ></div>
					<h3> '.$row["titleGallery"].' </h3>
					<p>'.$row["descGallery"].'</p>
					</a>';
				}
			}
			
				
			?>
	</div>
	
	
	<?php
	if(isset($_SESSION['username']))
	{
		echo '<div class="Gallery-upload" >
			<form  action="gallery-upload.include.php" method="post" enctype="multipart/form-data">
				<input type="text" name="filename" placeholder="Filename">
				<input type="text" name="filetitle" placeholder="Title">
				<input type="text" name="filedesc" placeholder="File description">
				<input type="file" name="file">
				<button type="submit" name="submit">Upload</button>
			</div>';
	}
		?>
	
	</div>	
</section>
</main>

</body>	
</html>