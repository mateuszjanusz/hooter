<?php
include_once "models/post_table.class.php";
$entryTable = new post_table( $db );
//was editor form submitted?
$postSubmitted = isset( $_POST['action'] );

if ( $postSubmitted ) {  
     $entry = $_POST['post'];
     $user = '1';

        $entryTable->saveEntry( $user, $entry );    
}

include_once "views/post-html.php";
?>