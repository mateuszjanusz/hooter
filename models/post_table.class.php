<?php
class post_table {
	private $db;
  
	public function __construct ( $db ) {
		$this->db = $db;
	}
     
        public function saveEntry ( $user, $entry ) {
		$user = mysqli_real_escape_string($this->db, $user);
		$entry =  mysqli_real_escape_string($this->db, $entry);

        $query = "INSERT INTO posts (post_text, user_id) VALUES ('$entry', '$user');";

        $result = mysqli_query($this->db, $query);

        if ($result === false) {
   		 echo mysqli_error($this->db);
        } else {
         echo "New post created successfully!";
        }
		
	}
}