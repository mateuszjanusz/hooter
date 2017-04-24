<?php
include_once "models/Post_Table.class.php";
include_once "controllers/functions.php";

$postTable = new Post_Table( $db );
$posts = $postTable->getAllPosts();

$button_delete= isset( $_POST['delete'] );
$button_edit = isset( $_POST['edit'] );

if ( $button_delete ) { 
     $id = $_POST['post_id'];
     $postTable->deletePost($id);
     header('Location: '.$_SERVER['REQUEST_URI']); //refresh the page after post deleted
} else if ( $button_edit ) { 
     $id = $_POST['post_id'];
     editPost($id);
} 

include_once "views/posts-html-logged.php";
?>
