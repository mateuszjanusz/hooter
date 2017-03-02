<?php
class Post_Table extends Table {

	public function saveEntry ( $user, $entry ) {
		$entrySQL = "INSERT INTO posts (user_id, post_text) VALUES (?, ?)";
		$formData = array( $user, $entry ); 
		$entryStatement = $this->makeStatement( $entrySQL, $formData );
		return $this->db->lastInsertId();
	}
     
}

?>