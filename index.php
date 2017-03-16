<?php
	error_reporting( E_ALL );
	ini_set( "display_errors", 1 );

	include_once "./config.php"; 

	try {
	$db = new PDO( $dbInfo, $dbUser, $dbPassword );
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	} catch (PDOexception $e) {
		echo "<h1>Connection failed!</h1><p>$e</p>";
	}

	$title = "Hooter";
	$css="css/bootstrap.min.css";
	include_once "templates/header.php";
	include_once "models/Table.class.php";
	include_once "models/User.class.php";
	$user = new User();

	//nav bar
	if (!$user->isLoggedIn() ) {
		include_once "templates/guest_nav.php";
	} else {
		include_once "templates/nav.php";
	}

	$router = isset( $_GET['page'] );

	if(!$router){
		$contrl = 'home'; // display home page
	} else {
		$contrl = $_GET['page']; // else requested page
		switch ($contrl) {
				case 'new_user' :
						include 'controllers/new_user.php';
						break;
				case 'login' :
						include 'controllers/login.php';
						break;
                case 'logout' :
						include 'controllers/logout.php';
						break;
				default :
				    // include 'views/404.php';
		}
	}

	include_once "controllers/$contrl.php"; //load the controller
	include_once "templates/footer.php";
?>