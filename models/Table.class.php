<?php
class Table {
	private $db;
    
	public function __construct ( $db ) {
		$this->db = $db;
	}
    public function makeStatement ( $sql, $data = NULL) {
		$statement = $this->db->prepare( $sql ); //use of prepare to prevent sql injection
		try{
			$statement->execute( $data );
		} catch (Exception $e){
		    $msg = "<p>You tried to run this sql: $sql<p>
			    <p>Exception: $e</p>";
		    trigger_error($msg);
		}
		return $statement;
    }
}
?>
