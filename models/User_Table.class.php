<?php
class User_Table extends Table {

    public function auth( $email, $password ){
        $sql = "SELECT email, user_id FROM users WHERE email = ? AND password = ?";
	    $password = SHA1($password); //hash the password
        $data = array($email, $password);
        $statement = $this->makeStatement( $sql, $data );
        if ( $statement->rowCount() === 1 ) {
            $out = true;
        } else {
            $loginProblem = new Exception( "<div class='alert alert-danger' role='alert'>The email or password you entered is incorrect.</div>" );
            throw $loginProblem;
        }
        return $out;
    }
    
    public function addLoginDate($id, $date){
        $sql = "UPDATE users SET last_logged_in = ? WHERE user_id = ?";
        $data = array($date, $id);
        $statement2 = $this->makeStatement( $sql, $data );
        return $date;
    }

    public function getUserId($email){
        $sql = "SELECT user_id, username FROM users WHERE email = ?";
        $data = array($email);
        $data = $this->makeStatement( $sql, $data );
		return $data;
    }

	public function registerUser ( $email, $username, $password, $password_confirm ) {
        $this->checkPassword( $password, $password_confirm );
        $this->checkEmail( $email );
        $this->checkUsername( $username );
        $sql = "INSERT INTO users ( email, username, password )
                VALUES( ?, ?, ? )";
	    $password = SHA1($password); //hash the password
        $data= array( $email, $username, $password );
        $this->makeStatement( $sql, $data );
    }

    private function checkEmail ($email) {
        $sql = "SELECT email FROM users WHERE email = ?";
        $data = array( $email );
        $this->makeStatement( $sql, $data );
        $statement = $this->makeStatement( $sql, $data );
        if ( $statement->rowCount() === 1 ) { //email found in database
            $e = new Exception("<div class='alert alert-warning' role='alert'>Sorry, the email: '$email' is already registered.</div>");
            throw $e;
        }
    }
    private function checkPassword ($password, $password_confirm) {
        if($password != $password_confirm){ //check if passwords are equal
             $e = new Exception("<div class='alert alert-danger' role='alert'>Sorry, your password and confirmation password do not match. Please try again.</div>");
            throw $e;
        }
    }
    private function checkUsername ($username) {
        $sql = "SELECT username FROM users WHERE username = ?";
        $data = array( $username );
        $this->makeStatement( $sql, $data );
        $statement = $this->makeStatement( $sql, $data );
        if ( $statement->rowCount() === 1 ) {
            $e = new Exception("<div class='alert alert-warning' role='alert'>Sorry, the name: '$username' is already registered.</div>");
            throw $e;
        }
    }

    public function getUserDetails($id){
        if(empty($id))
            throw new Exception("No user ID provided");
            
        $sql = "SELECT username, email, date_created, location, profile_image, followers_count, posts_count
                FROM users WHERE user_id = ?";
        $data = array($id);
        $details = $this->makeStatement( $sql, $data );
		return $details;
    }
    
    public function getUserPosts($id){
        if(empty($id))
            throw new Exception("No user ID provided");
            
        $sql = "SELECT p.post_id, p.post_text, p.date_created, p.image, p.reply_id, p.user_id, u.username
		FROM posts p
		INNER JOIN users u ON p.user_id
		WHERE p.user_id = ? 
        AND p.user_id = u.user_id
		ORDER BY p.date_created DESC";
        $data = array($id);
        $posts = $this->makeStatement( $sql, $data );
		return $posts;
    }
}

?>
