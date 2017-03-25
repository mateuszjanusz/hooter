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

	public function login ($id) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $id;
        header('Location: index.php'); exit(); //redirect to home page
	}

	public function logout () {
        $_SESSION['logged_in'] = false;
        $_SESSION['user_id'] = '';
        header('Location: index.php'); exit(); //redirect to home page

	}

}
?>
