<?php
class Post_Table extends Table {

	public function newPost($user, $entry) {
		$sql = "INSERT INTO posts (user_id, post_text) VALUES (?, ?)";
		$formData = array( $user, $entry );
		$entryStatement = $this->makeStatement( $sql, $formData );
		// return $this->db->lastInsertId();
	}
	public function newPostWithImage($user, $entry, $image) {
		$sql = "INSERT INTO posts (user_id, post_text, image) VALUES (?, ?, ?)";
		$formData = array( $user, $entry, $image );
		$entryStatement = $this->makeStatement( $sql, $formData );
	}

	public function getAllPosts() {
		$sql = "SELECT p.post_id, p.post_text, p.date_created, p.image, p.reply_id, p.user_id, u.username
		FROM posts p
		INNER JOIN users u ON p.user_id
		WHERE p.user_id = u.user_id
		ORDER BY p.date_created DESC";
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

	public function searchPosts($field, $keyword){
		$sql = "SELECT p.post_text, p.post_id, p.user_id, p.date_created, p.image, p.reply_id, 
		u.user_id, u.username
		FROM posts p
		INNER JOIN users u ON p.user_id 
		WHERE p.user_id = u.user_id
		AND $field LIKE '%$keyword%'";
		$statement = $this->makeStatement( $sql );
		if($statement->rowCount() === 0){
			echo "<div class='alert alert-warning' role='alert'>No posts found.</div>";
		}
            
		return $statement;
	}

}

?>
