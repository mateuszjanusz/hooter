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

	public function login ($id, $username, $is_first) {
        //set up session data 
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['is_first_login'] = $is_first;
        header('Location: index.php'); exit(); //redirect to home page
	}

	public function logout () {
        session_destroy(); //erase all session data
        header('Location: index.php'); exit(); //redirect to home page

	}

}
?>
