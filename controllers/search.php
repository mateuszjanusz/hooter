<?php

$search = isset( $_POST['search'] );
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );

    if($search){
      $keyword = $_POST['keyword'];
      $keyword = strip_tags($keyword); //remove all html, xml or php tags
      if ($keyword == ''){ //if search field empty call js function
        echo "<script>emptySearch()</script>";
      }
      $field = $_POST['field'];
      $posts = $postTable->searchPosts($field, $keyword);
    };

include_once "views/search-html.php";

?>
