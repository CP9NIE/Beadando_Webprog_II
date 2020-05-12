<?php
	$_session['username']= "admin";
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta charset="utf-8">
	<title>purrfect pics</title>
</head>
<body>
<main>

<section class="gallery-links">
	<div class="wrapper">
	<h2></h2>
	
	<div class="gallery-container">
			<?php
			include_once 'gallerydb.php';
			
			$sql= "select * from gallery order by ordergallery desc";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "connection error";
			}
			else{
				mysqli_stmt_execute($stmt);
				$result= mysqli_stmt_get_result($stmt);
				
				while($row = mysqli_fetch_assoc($result)){
				
					echo '<a href="#">
					<div style="background-image: url(/gallery/'.$row["imgfullnamegallery"].');" ></div>
					<h3> '.$row["titlegallery"].' </h3>
					<p>'.$row["descgallery"].'</p>
					</a>';
				}
			}
			
				
			?>
	</div>
	
	
	<?php
	if(isset($_session['username']))
	{
		
		echo '<div class="gallery-upload"  >
			<form  action="gallery.upload.include.php" method="post" enctype="multipart/form-data" name="feltolt">
				<input type="text" name="filename" placeholder="filename">
				<input type="text" name="filetitle" placeholder="title">
				<input type="text" name="filedesc" placeholder="file description">
				<input type="file" name="file">
				<button type="submit" name="submit">upload</button>
			</div><br><br>'; 
	}
		?>
	
	</div>	
</section>
</main>

<?php

	date_default_timezone_set('Europe/Budapest');
	include 'comments.db.php';
	include 'comment.inc.php';
echo "<form method='POST' action='".setComments($conn)."'>
<input type='hidden' name='uid' value='Anon'>
<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
<textarea name='message'> </textarea><br>
<button type='submit' name= 'commentSubmit'>Comment</button><br><br><br><br>
</form>";

getComments($conn);
?>
</body>  	
</html>