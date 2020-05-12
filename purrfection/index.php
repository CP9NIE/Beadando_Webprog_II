 
<?php session_start(); ?>
<?php require_once 'protected/config.php'; ?>
<?php require_once USER_MANAGER; ?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta charset="utf-8">
	<title>Purrfection</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Saját CSS -->
	<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'style.css?'.date('YmdHis', filemtime(PUBLIC_DIR.'style.css'))?>">
</head>
<body>
	
		<div class="container-fluid">
			<header><?php include_once PROTECTED_DIR.'header.php'; ?></header>
			<nav><?php require_once PROTECTED_DIR.'nav.php'; ?></nav>
			<content><?php require_once PROTECTED_DIR.'routing.php'; ?>
				<div class="hope">
					<ul class = "nice">
					<li> Hope You Like My Website!</li>
					<li> Have a nice day! </li>
					</ul>
					</div>
			</content>
			<footer><?php include_once PROTECTED_DIR.'footer.php'; ?></footer>
		</div>

</body>
</html>

