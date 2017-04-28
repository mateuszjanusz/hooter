<?php
echo '<script>myMap()</script>';

$userDetailsFound = isset( $userDetails );
if ( $userDetailsFound === false ) {
    echo 'no user found' ;
}
$userHTML = "<ol class='breadcrumb'>
                <li class='active'>Your profile</li>
            </ol>
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
            <div class='row'>
              <div class='col-md-4'>
                <img src='uploads/profile.png' class='img-rounded' style='width:200px;height:200px;'>
              </div>
              <div class='col-md-8'>
                  <h5><small>email:   </small>$user->email</h5>
                  <h5><small>joined:  </small>$date_joined</h5>
                  <h5><small>followers:   </small>$user->followers_count</h5>
                  <h5><small>posts:   </small>$user->posts_count</h5>
                  <h5><small>location:    </small>$user->location</h5>
              </div>
            </div>
            
        </div>
        <div class='panel-footer'>
            <div id='googleMap' style='width:100%;height:200px;'>
        </div>
</div>
     </div>
     
     </li>"; 
}
$userHTML .= "</ul>
<ol class='breadcrumb'>
    <li class='active'>Your posts</li>
</ol>";

echo $userHTML;

include_once "controllers/user_posts.php";
?>
