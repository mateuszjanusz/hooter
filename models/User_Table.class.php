<?php
class User_Table extends Table {

	public function registerUser ( $email, $username, $password ) {
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