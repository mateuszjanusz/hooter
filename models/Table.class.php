<?php
class Table {
	private $db;
    
	public function __construct ( $db ) {
		$this->db = $db;
	}
     
        public function makeStatement ( $sql, $data = NULL) {
		$statement = $this->db->prepare( $sql );
		try{
			$statement->execute( $data );
		} catch (Exception $e){
		    $msg = "<p>You tried to run this sql: $entrySQL<p>
			    <p>Exception: $e</p>";
		    trigger_error($msg);
		}
		return $statement;
    }
}
?>