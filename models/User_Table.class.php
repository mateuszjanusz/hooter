<?php
class User_Table extends Table {

    public function auth( $email, $password ){
        $sql = "SELECT email FROM users WHERE email = ? AND password = ?";
	    $password = SHA1($password);
        $data = array($email, $password);
        $statement = $this->makeStatement( $sql, $data );
        if ( $statement->rowCount() === 1 ) {
            $out = true;
        } else {
            $loginProblem = new Exception( "The email or password you entered is incorrect." );
            throw $loginProblem;
        }
        return $out;
    }

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
        if ( $statement->rowCount() === 1 ) {
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
        if ( $statement->rowCount() === 1 ) {
            $e = new Exception("Sorry, the name: '$username' is already registered.");
            throw $e;
        } 
    }
}

?>