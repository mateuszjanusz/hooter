<?php
include_once "models/User_Table.class.php";

$userTable = new User_Table( $db );
$userDetails = $userTable->getUserDetails($_SESSION['user_id']);
include_once "views/profile-html.php";
?>
