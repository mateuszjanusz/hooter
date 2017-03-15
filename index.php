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

	$router = isset( $_GET['page'] );

	if(!$router){
		$contrl = 'home'; // display home page
	} else {
		$contrl = $_GET['page']; // else requested page
		switch ($contrl) {
			
				case 'new_user' :
						include 'controllers/new_user.php';
						break;
				default :
				    // include 'views/404.php';
		}
	}

	include_once "controllers/$contrl.php"; //load the controller
	include_once "templates/footer.php";
?>