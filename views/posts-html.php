<?php
$postsFound = isset( $posts );
if ( $postsFound === false ) {
    echo 'no posts found' ;
}
$postsHTML = "<ul id='posts'>";
while ( $post = $posts->fetchObject() ) {
	//create a list element <li> for each of the entries
	$postsHTML .= 
	"<li>
        <h3>$post->username</h3>
        <div>$post->post_text</p>
	</li>"; 
}
$postsHTML .= "</ul>";

echo $postsHTML;
?>