<?php

$postsFound = isset( $posts );
if ( $postsFound === false ) {
    echo 'no posts found' ;
}
$postsHTML = "<ul id='posts'>";
while ( $post = $posts->fetchObject() ) {
	//create a list element <li> for each of the entries
	//$today = time(); //get today date
    $date_created = $post->date_created; //get date when post was created
    $date_created = strtotime($date_created); 
    $difference = intval(($today - $date_created) / 86400); //calculate the difference between these 2 dates
	$postsHTML .=
	"<li class='list-group-item'><div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>$post->username <small> $difference</small></h4>";
    $postsHTML .="</div>
            <div class='panel-body'>
                <h5>$post->post_text</h5>";
    if(!is_null($post->image)){
        $postsHTML .= "<img src='uploads/$post->image' width='400'>";
    }
    $postsHTML .= "</div>
        </div>
        </li>";         
}

$postsHTML .= "</ul>";

echo $postsHTML;
?>
