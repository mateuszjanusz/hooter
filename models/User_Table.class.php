<?php
class User_Table extends Table {

	public function registerUser ( $email, $username, $password, $password_confirm ) {
        $this->checkPassword( $password, $password_confirm );
        $this->checkEmail( $email );
        $this->checkUsername( $username );
        
        $sql = "INSERT INTO users ( email, username, password )
                VALUES( ?, ?, ? )";
	    $password = SHA1($password);
        $data= array( $email, $username, $password );
        $this->makeStatement( $sql, $data );  
    }

    private function checkEmail ($email) {
        $sql = "SELECT email FROM users WHERE email = ?";
        $data = array( $email );
        $this->makeStatement( $sql, $data );
        $statement = $this->makeStatement( $sql, $data );
        if ( $email < 1 ) {
            $e = new Exception("Sorry, you must enter email.");
            throw $e;
        } else if ( $statement->rowCount() === 1 ) {
            $e = new Exception("Sorry, the email: '$email' is already registered.");
            throw $e;
        } 
    }
    private function checkPassword ($password, $password_confirm) {
        if($password!=$password_confirm){
             $e = new Exception("Sorry, your password and confirmation password do not match. Please try again.");
            throw $e;
        } 
    }
    private function checkUsername ($username) {
        $sql = "SELECT username FROM users WHERE username = ?";
        $data = array( $username );
        $this->makeStatement( $sql, $data );
        $statement = $this->makeStatement( $sql, $data );
        if ( $username < 3 ) {
            $e = new Exception("Sorry, your username must be at least 3 characters long.");
            throw $e;
        } else if ( $statement->rowCount() === 1 ) {
            $e = new Exception("Sorry, the name: '$username' is already registered.");
            throw $e;
        } 
    }
}

?>