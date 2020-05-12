<?php

//elküldöm a kommentet...
function setComments($conn){
	if(isset($_POST['commentSubmit'])){
		$uid= $_POST['uid'];
		$date= $_POST['date'];
		$message= $_POST['message'];
		
		$sql = "INSERT INTO comments (uid, date, message) VALUES ('".$uid."', '".$date."', '".$message."')";
		$result = $conn ->query($sql);
	}
}
//lekérdezem és kiíratom....
function getComments($conn) {
	$sql = "SELECT * FROM comments ORDER BY date DESC";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		//a div a rendezés miatt kell,ahogy a p is
		echo "<div class=comments>";
		
			echo "<p class=anon>" ;
				echo $row['uid']."<br>" ;
			echo "</p>";
			
			echo "<p class=datum>";
				echo $row['date']."<br>" ;
			echo "</p>";
			
			echo $row['message'];
		echo "</div>";
	}
	
	
}