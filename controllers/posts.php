<?php
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );
$posts = $postTable->getAllPosts();

$button_delete = isset( $_POST['delete'] );
$button_edit = isset( $_POST['edit'] );


if ( $button_delete ) { 
     $id = $_POST['post_id'];
     $postTable->deletePost( $id );
} else if ( $button_edit ) { 
     $id = $_POST['post_id'];
     $postTable->deletePost( $id );
} 

include_once "views/posts-html.php";
?>
