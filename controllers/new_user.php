<?php
include_once "models/User_Table.class.php";

$registerUser = isset( $_POST['registerUser'] );
if( $registerUser ) {
    $newEmail = $_POST['email'];
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password']; 
       
    $adminTable = new Admin_Table($db);
    try {
        $adminTable->registerUser( $newEmail, $newUsername,  $newPassword );
        $registerFormMessage = "New user created!";
    } catch ( Exception $e ) {
        $registerFormMessage = $e->getMessage();
    }
}
include_once "views/new_user-html.php";