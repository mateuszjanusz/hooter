<?php
include_once "models/Table.class.php";
include_once "models/Post_Table.class.php";
include_once "controllers/functions.php";
$postTable = new Post_Table( $db );
//was editor form submitted?
$postSubmitted = isset( $_POST['action'] );

if ( $postSubmitted ) {  
     $entry = $_POST['post'];
     if ($entry == ''){
         echo "<script>emptyPost()</script>"; 
        //  exit;
     }
     $entry = strip_tags($entry); //remove all HTML, XML, and PHP tags
     $user = $_SESSION['user_id'];
    //  echo var_dump($_FILES['image']);
     if(!empty($_FILES['image']['name'])){    
         $file = $_FILES['image'];
         $file_name = uploadFile($file);
         $postTable->newPostWithImage( $user, $entry, $file_name );
     } else {
         $postTable->newPost( $user, $entry );
     }
    
}

include_once "views/new_post-html.php";
?>
