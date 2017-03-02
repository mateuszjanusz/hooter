<?php
include_once "models/Table.class.php";
include_once "models/Post_Table.class.php";
$postTable = new Post_Table( $db );
//was editor form submitted?
$postSubmitted = isset( $_POST['action'] );

if ( $postSubmitted ) {  
     $entry = $_POST['post'];
     $user = '1';
     $postTable->saveEntry( $user, $entry );    
}

include_once "views/new_post-html.php";
?>