<?php
	error_reporting( E_ALL );
	ini_set( "display_errors", 1 );

	include_once "./config.php"; 
	$db = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName) or die(mysqli_error());


	$title = "Hooter";
	$css="css/bootstrap.min.css";

	include_once "templates/header.php";

	echo "Hello";
	include_once "templates/footer.php";
	
	// $navigation = isset( $_GET['page'] );
	// if ( $navigation ) {
	//         $contrl = $_GET['page']; //load corresponding controller
	// } else {
	// 	$contrl = "entries"; //or load default controller
	// }
	// include_once "controllers/admin/$contrl.php"; //load the controller
	// include_once "templates/footer.php";
?>