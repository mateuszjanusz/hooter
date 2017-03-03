<?php
$postsFound = isset( $posts );
if ( $postsFound === false ) {
    echo 'no posts found' ;
}
$postsHTML = "<ul id='posts'>";
while ( $post = $posts->fetchObject() ) {
	//create a list element <li> for each of the entries
	$postsHTML .= 
	"<li class='list-group-item'><div class='panel panel-default'>
        <div class='panel-heading'>$post->username is saying:</div>
        <div class='panel-body'>
            <h5>$post->post_text</h5>
        </div>
        <div class='panel-footer'>
            <h6>Created: $post->date_created</h6>
        </div>
     </div>
     
     </li>"; 
}
$postsHTML .= "</ul>";

echo $postsHTML;
?>