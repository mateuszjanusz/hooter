<?php
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );
$posts = $postTable->getAllPosts();

include_once "views/posts-html.php";
?>
