<?php
$loggingOut = isset ( $_POST['logout'] );
if ( $loggingOut ){
	$user->logout();
}

include_once'views/logout-html.php';
?>