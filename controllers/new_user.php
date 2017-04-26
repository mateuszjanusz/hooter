<?php
include_once "models/Table.class.php";
include_once "models/User_Table.class.php";

$registerUser = isset( $_POST['registerUser'] );
if( $registerUser ) {
    if(!empty($_POST['email'])){
        $newEmail = $_POST['email'];
        $newUsername = $_POST['username'];
        $newUsername = strip_tags($newUsername); //remove all html, xml or php tags
        $newPassword = $_POST['password']; 
        $newPasswordConfirm = $_POST['password_confirm']; 
        $userTable = new User_Table($db);
        try {
            $userTable->registerUser( $newEmail, $newUsername,  $newPassword, $newPasswordConfirm );
            $id = $userTable->getUserId($newEmail);
            $user->login($id, $newUsername, true);
            $registerFormMessage = "New user created!";
        } catch ( Exception $e ) {
            $registerFormMessage = $e->getMessage();
        }
    } else {
        $registerFormMessage = "Please make sure you enter both an email and a password!";
    }
}

include_once "views/new_user-html.php";      

?>
