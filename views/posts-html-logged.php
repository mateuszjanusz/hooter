<?php

$postsFound = isset( $posts );
if ( $postsFound === false ) {
    echo 'no posts found' ;
}
$postsHTML = "<ul id='posts'>";
while ( $post = $posts->fetchObject() ) {
    //echo var_dump($post);
	//create a list element <li> for each of the entries
	$postsHTML .=
	"<li class='list-group-item'><div class='panel panel-default'>
        <div class='panel-heading'>
            <input type='hidden' name='user_id' value='$post->user_id' />
            <input type='hidden' name='post_id' value='$post->post_id' />
            <h4>$post->username <small> $post->date_created</small></h4>";
        if($_SESSION['user_id'] == $post->user_id){
            $postsHTML .= "<form method='post' action='index.php?page=home' id='post_editor'>
                <button type='submit' class='pull-right' name='delete'>
                    <span class='glyphicon glyphicon-trash'></span>
                </button>
            </form>"; 
        }
    	
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
