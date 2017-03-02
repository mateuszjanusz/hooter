<?php
	error_reporting( E_ALL );
	ini_set( "display_errors", 1 );

	include_once "./config.php"; 
	$db = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName) or die(mysqli_error());

	// try {
	// $db = new PDO( $dbInfo, $dbUser, $dbPassword );
	// 	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	// } catch (PDOexception $e) {
	// 	echo "<h1>Connection failed!</h1><p>$e</p>";
	// }

	$title = "Hooter";
	$css="css/bootstrap.min.css";

	include_once "templates/header.php";

	echo "<h2>Hooter</h2>";

	$router = isset( $_GET['page'] );

	if($router){
		$contrl = $_GET['page']; //load corresponding controller
	} else {
		$contrl = 'post';
	}

	include_once "controllers/$contrl.php"; //load the controller
	include_once "templates/footer.php";
?>