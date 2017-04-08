<?php
$out = "<form method='post' action='?page=search'>
    <input type='text' name='keyword' class='form-control' placeholder='Search posts'>
    by <Select name='field'>
        <Option value='post_text'>posts</option>
        <Option value='username'>users</option>
      </Select> 
    <button type='submit' name='search' class='btn btn-default'>Search</button>
</form>";

echo $out;

$postsFound = isset( $posts );

//if search button pressed and result is empty
// if($search && !$posts){ 
//     echo "<p>no posts found</p>";
// }

if ($postsFound){
    
    $postsHTML = "<ul id='posts'>";
    while ( $post = $posts->fetchObject() ) {
        //create a list element <li> for each of the entries
        $postsHTML .=
        "<li class='list-group-item'><div class='panel panel-default'>
            <div class='panel-heading'>
                <h4>$post->username <small> $post->date_created</small></h4>";
                //show delete button only if user is logged in
        $postsHTML .="</div>
                <div class='panel-body'>
                    <h5>$post->post_text</h5>
                </div>
            </div>
            </li>";
    }
    $postsHTML .= "</ul>";

    echo $postsHTML;
}

?>
