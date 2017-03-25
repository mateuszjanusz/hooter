<?php

$search = isset( $_POST['search'] );
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );

    if($search){
      $keyword = $_POST['keyword'];
      $posts = $postTable->searchPosts($keyword);
    };

include_once "views/search-html.php";

?>
