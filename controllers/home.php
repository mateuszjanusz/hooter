<?php

//TOP NAV BAR content below
    // echo "<img src='./logo.png' class='img-responsive' alt='Hooter logo'>";
    include_once "templates/nav.php";


echo "<div class='row'>
<div class='col-md-4'>";
    //LEFT COLUMN content below


echo "</div>
<div class='col-md-8'>
";
    //MIDDLE COLUMN content below

    include_once "controllers/new_post.php";
    include_once "controllers/posts.php";

echo "</div>
<div class='col-md-4'>
";
    //RIGHT COLUMN content below


echo "</div>";

?>
