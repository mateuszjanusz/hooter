<?php
class User {
    public function __construct(){
        session_start();
    }

 	public function isLoggedIn(){
        $sessionIsSet = isset( $_SESSION['logged_in'] );
        if ( $sessionIsSet ) {
            $out = $_SESSION['logged_in'];
        } else {
            $out = false;
        }
        return $out;
	}

	public function login ($id, $email) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $id;
        $_SESSION['user_email'] = $email;
        $_SESSION['is_first_login'] = false;
        header('Location: index.php'); exit(); //redirect to home page
	}

	public function logout () {
        session_destroy();
        header('Location: index.php'); exit(); //redirect to home page

	}

}
?>
