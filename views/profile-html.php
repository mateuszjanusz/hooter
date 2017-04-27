<?php
$userDetailsFound = isset( $userDetails );
if ( $userDetailsFound === false ) {
    echo 'no user found' ;
}
$userHTML = "<h5> Your profile: </h5>
<ul id='userDetails'>";
while ( $user = $userDetails->fetchObject() ) {
	$date_joined = substr($user->date_created, 0, 10); //cut off and show only date without time
	$userHTML .= 
	"<li class='list-group-item'><div class='panel panel-default'>
        <div class='panel-heading'>
            <h5><small>username:   </small>$user->username</h5>
                <input type='hidden' name='post_id' value='$user->location' />
        </div>
        <div class='panel-body'>
            <h5><small>email:   </small>$user->email</h5>
            <h5><small>joined:  </small>$date_joined</h5>
            <h5><small>location:    </small>$user->location</h5>
            <h5><small>followers:   </small>$user->followers_count</h5>
            <h5><small>posts:   </small>$user->posts_count</h5>
        </div>
     </div>
     
     </li>"; 
}
$userHTML .= "</ul>
<h5> Your posts: </h5>";

echo $userHTML;
?>
