<?php
//if user is logged in, show new post form and more options in post such as delete or edit
if ($user->isLoggedIn()) {
    if(!$_SESSION['is_first_login']){ // display welcome message only once after log in
        echo "<div class='alert alert-info'>Welcome " . $_SESSION['username'] . "!</div>";
        $_SESSION['is_first_login'] = true;
    }
    include_once "controllers/new_post.php";
    include_once "controllers/posts-logged.php"; //display posts with option to delete
} else { // if guest then show only simple list of posts 
    include_once "controllers/posts.php";
}
?>
