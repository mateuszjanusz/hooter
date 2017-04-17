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
    $postsHTML .= "<form method='post' action='index.php?page=home' id='post_editor'>
        <input type='hidden' name='user_id' value='$post->user_id' />
        <input type='hidden' name='post_id' value='$post->post_id' />
        <button type='submit' class='pull-right' name='delete'>
            <span class='glyphicon glyphicon-trash'></span>
        </button>
    </form>"; 	
    $postsHTML .="</div>
            <div class='panel-body'>
                <h5>$post->post_text</h5>
            </div>
        </div>
        </li>";
}

$postsHTML .= "</ul>";

echo $postsHTML;
?>