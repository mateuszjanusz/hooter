<?php
class Post_Table extends Table {

	public function saveEntry ( $user, $entry ) {
		$entrySQL = "INSERT INTO posts (user_id, post_text) VALUES (?, ?)";
		$formData = array( $user, $entry ); 
		$entryStatement = $this->makeStatement( $entrySQL, $formData );
	//	return $this->db->lastInsertId();
	}

	public function getAllPosts () {
		$entrySQL = "SELECT p.post_text AS post_text, p.date_created, p.image, p.reply_id, u.username AS username
		FROM posts p
		INNER JOIN users u ON p.user_id";
		
		$statement = $this->makeStatement( $entrySQL );
		return $statement;
	}
     
}

?>