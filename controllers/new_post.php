<?php
include_once "models/Table.class.php";
include_once "models/Post_Table.class.php";
include_once "controllers/functions.php";
$postTable = new Post_Table( $db );
//was editor form submitted?
$postSubmitted = isset( $_POST['action'] );

if ( $postSubmitted ) {  
     $entry = $_POST['post'];
     $user = $_SESSION['user_id'];
     echo var_dump($_FILES['image']);
     if(empty($_FILES['image']['name'])){
         $file_name = $_FILES['image']['name'];
         $postTable->newPostWithImage( $user, $entry, $file_name );    
         $file = $_FILES['image'];
         uploadFile($file);
     } else {
         $postTable->newPost( $user, $entry );
     }
    
}

include_once "views/new_post-html.php";
?>
