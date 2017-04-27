<?php

$search = isset( $_POST['search'] );
include_once "models/Post_Table.class.php";

$postTable = new Post_Table( $db );

    if($search){
      $keyword = $_POST['keyword'];
      $keyword = strip_tags($keyword);
      if ($keyword == ''){
        echo "<p>You need to enter a search term!</p>";
        echo "<a href='?page=search' class='btn btn-default'>Back to search</a>";
        exit;
      }
      //$keyword = strip_tags($keyword); //remove all html, xml or php tags

      $field = $_POST['field'];
      $field = strip_tags($field);
      $posts = $postTable->searchPosts($field, $keyword);
    };

include_once "views/search-html.php";

?>
