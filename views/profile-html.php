<?php
$userDetailsFound = isset( $userDetails );
if ( $userDetailsFound === false ) {
    echo 'no user found' ;
}
$userHTML = "<ul id='userDetails'>";
while ( $user = $userDetails->fetchObject() ) {
	//create a list element <li> for each of the entries
	$userHTML .= 
	"<li class='list-group-item'><div class='panel panel-default'>
        <div class='panel-heading'>
            <h4>$user->username</h4>
                <input type='hidden' name='post_id' value='$user->location' />
        </div>
        <div class='panel-body'>
            <p>email: </p><h5>$user->email</h5>
            <p>joined: </p><h5>$user->date_created</h5>
            <p>location: </p><h5>$user->location</h5>
            <p>followers: </p><h5>$user->followers_count</h5>
            <p>posts: </p><h5>$user->posts_count</h5>
        </div>
     </div>
     
     </li>"; 
}
$userHTML .= "</ul>";

echo $userHTML;
?>
