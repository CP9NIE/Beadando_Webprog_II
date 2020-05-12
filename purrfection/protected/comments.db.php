<?php

$conn = mysqli_connect('localhost:3308', 'root', '', 'commentsection');

if(!$conn) {
	die("Conn. FAILED: ".mysqli_connection_error());
}