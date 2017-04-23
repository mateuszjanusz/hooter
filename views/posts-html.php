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
        <div class='panel-heading'>
            <h4>$post->username <small> $post->date_created</small></h4>";
    $postsHTML .="</div>
            <div class='panel-body'>
                <h5>$post->post_text</h5>
                <h6>$post->image</h6>
            </div>
        </div>
        </li>";
}

$postsHTML .= "</ul>";

echo $postsHTML;
?>
