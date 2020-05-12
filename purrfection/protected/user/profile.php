<?php 
if(!array_key_exists('u', $_GET) || empty($_GET['u'])) :
	header('Location: index.php'); 
else:
	$query = "SELECT id, first_name, last_name, email FROM users WHERE id = :id"; 
	$params = [':id' => $_GET['u']]; 
	require_once DATABASE_CONTROLLER; 

	$user = getRecord($query, $params); 
	if(empty($user)) :
		header('Location: index.php'); 
	else : ?>
		<h2><?=$user['first_name'].' '.$user['last_name'] ?></h2>
		<h3><?=$user['email'] ?></h3>
	<?php endif;
endif;
?> 
