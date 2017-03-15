<?php
include_once "models/Table.class.php";
include_once "models/User_Table.class.php";

$registerUser = isset( $_POST['registerUser'] );
if( $registerUser ) {
    $newEmail = $_POST['email'];
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password']; 
       
    $userTable = new User_Table($db);
    try {
        $userTable->registerUser( $newEmail, $newUsername,  $newPassword );
        $registerFormMessage = "New user created!";
    } catch ( Exception $e ) {
        $registerFormMessage = $e->getMessage();
    }
}
include_once "views/new_user-html.php";