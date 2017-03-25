<?php
class Post_Table extends Table {

	public function saveEntry($user, $entry) {
		$sql = "INSERT INTO posts (user_id, post_text) VALUES (?, ?)";
		$formData = array( $user, $entry );
		$entryStatement = $this->makeStatement( $sql, $formData );
		// return $this->db->lastInsertId();
	}

	public function getAllPosts() {
		$sql = "SELECT p.post_text AS post_text, p.post_id AS post_id, p.date_created, p.image, p.reply_id, u.user_id AS user_id, u.username AS username
		FROM posts p
		INNER JOIN users u ON p.user_id";

		$statement = $this->makeStatement( $sql );
		return $statement;
	}

	public function updatePost($id, $text) {
		$sql = "UPDATE posts
                	SET post_text = ?
        	        WHERE post_id = ?";
		$data = array( $text, $id );
		$statement = $this->makeStatement( $sql, $data );
		return $statement;
	}

	public function deletePost($id) {
		$sql = "DELETE FROM posts WHERE post_id = ?";
		$data = array( $id );
		$statement = $this->makeStatement( $sql, $data );

	}

	public function searchPosts($keyword){
		$sql = "SELECT * FROM posts WHERE post_text LIKE ?";
		$data = array( $keyword );
		$statement = $this->makeStatement( $sql );
		return $statement;
	}

}

?>
