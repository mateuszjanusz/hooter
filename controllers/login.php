<?php
include_once "models/User_Table.class.php";
$loginFormSubmitted = isset( $_POST['login'] );

if( $loginFormSubmitted ) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userTable = new User_Table( $db );
    try {
        $userTable->auth( $email, $password );
        $user->login();
    } catch ( Exception $e ) {
        echo $e->getMessage();
    }
}
if (!$user->isLoggedIn() ) {
    include_once "views/login-html.php";
}
?>