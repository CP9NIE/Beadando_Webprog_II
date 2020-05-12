<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else :
	if(!array_key_exists('u', $_GET) || empty($_GET['u'])) : 
		header('Location: index.php');
else: 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edituser'])) {
		$postData = [
			'id' => $_POST['userId'],
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email' => $_POST['email']
		];
		if($postData['id'] != $_GET['u']) {
			echo "Hiba a felhasználó azonosítása során!";
		} else {
			if(empty($postData['first_name']) || empty($postData['last_name']) || empty($postData['email']){
				echo "Hiányzó adat(ok)!";
			} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
				echo "Hibás email formátum!";
			} else {
				$query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
				$params = [
					':first_name' => $postData['first_name'],
					':last_name' => $postData['last_name'],
					':email' => $postData['email'],
					':id' => $postData['id']
				];
				require_once DATABASE_CONTROLLER;
				if(!executeDML($query, $params)) {
					echo "Hiba az adatbevitel során!";
				} header('Location: ?P=user_list');
			}
		}
	}
	$query = "SELECT id, first_name, last_name, email FROM workers WHERE id = :id";
	$params = [':id' => $_GET['u']];
	require_once DATABASE_CONTROLLER;
	$worker = getRecord($query, $params);
	if(empty($user)) :
		header('Location: index.php');
		else : ?>
			<form method="post">
				<input type="hidden" name="userId" value="<?=$user['id'] ?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="userFirstName">First Name</label>
						<input type="text" class="form-control" id="userFirstName" name="first_name" value="<?=$user['first_name'] ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="userLastName">Last Name</label>
						<input type="text" class="form-control" id="userLastName" name="last_name" value="<?=$user['last_name'] ?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userEmail">Email</label>
						<input type="email" class="form-control" id="userEmail" name="email" value="<?=$user['email'] ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-primary" name="editWorker">Save Changes</button>
			</form>
		<?php endif;
	endif;
endif;
?>