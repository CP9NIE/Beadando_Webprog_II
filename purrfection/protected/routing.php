<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
	case 'test': require_once PROTECTED_DIR.'normal/permission_test.php'; break;


	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;
	
	case 'users': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/user_list.php' : header('Location: index.php'); break;
	
	case 'profile': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/profile.php' : header('Location: index.php'); break;
	
	case 'gallery': IsUserLoggedIn() ? require_once PROTECTED_DIR.'gallery.php' : header('Location: index.php'); break;
	
	case 'upload': IsUserLoggedIn() ? require_once PROTECTED_DIR.'galleryupload.inclued.php' : header('Location: index.php'); break;
	
	case 'setcomments': IsUserLoggedIn() ? require_once PROTECTED_DIR.'comment.inc.php' : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}

?>