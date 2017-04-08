<?php
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );
$posts = $postTable->getAllPosts();

$buttonDelete= isset( $_POST['delete'] );

if ( $buttonDelete ) { 
     $id = $_POST['post_id'];
     $postTable->deletePost( $id );
}

include_once "views/posts-html.php";
?>