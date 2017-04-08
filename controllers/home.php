<?php
if ($user->isLoggedIn()) {
    include_once "controllers/new_post.php";
    include_once "controllers/posts-logged.php"; //display posts with option to delete
} else {
    include_once "controllers/posts.php";
}
?>
