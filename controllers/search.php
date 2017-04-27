<?php

$search = isset( $_POST['search'] );
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );

    if($search){
      $keyword = $_POST['keyword'];
      $keyword = strip_tags($keyword);
      if ($keyword == ''){
        echo "<script>emptySearch()</script>";
      }
      //$keyword = strip_tags($keyword); //remove all html, xml or php tags

      $field = $_POST['field'];
      $field = strip_tags($field);
      $posts = $postTable->searchPosts($field, $keyword);
    };

include_once "views/search-html.php";

?>
