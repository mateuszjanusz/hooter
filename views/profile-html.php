<?php
$userDetailsFound = isset( $userDetails );
if ( $userDetailsFound === false ) {
    echo 'no user found' ;
}
$userHTML = "<h5> Your profile: </h5>
<ul id='userDetails'>";
while ( $user = $userDetails->fetchObject() ) {
	//create a list element <li> for each of the entries
	$userHTML .= 
	"<li class='list-group-item'><div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>$user->username</h4>
                <input type='hidden' name='post_id' value='$user->location' />
        </div>
        <div class='panel-body'>
            <p>email: </p><p>$user->email</p>
            <p>joined: </p><p>$user->date_created</p>
            <p>location: </p><p>$user->location</p>
            <p>followers: </p><p>$user->followers_count</p>
            <p>posts: </p><p>$user->posts_count</p>
        </div>
     </div>
     
     </li>"; 
}
$userHTML .= "</ul>
<h5> Your posts: </h5>";

echo $userHTML;
?>
