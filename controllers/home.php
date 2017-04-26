<?php
if ($user->isLoggedIn()) {
    if(!$_SESSION['is_first_login']){
        echo "<div class='alert alert-info'>Welcome back " . $_SESSION['user_email'] . "!</div>";
        $_SESSION['is_first_login'] = true;
    }
    include_once "controllers/new_post.php";
    include_once "controllers/posts-logged.php"; //display posts with option to delete
} else {
    include_once "controllers/posts.php";
}
?>
