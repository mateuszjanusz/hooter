<?php
$out = "
<ul class='nav nav-pills'>
<a class='navbar-brand' href='?page=home'>
            <img alt='Hooter' src='./logo.png'>
</a>
  <li role='presentation'><a href='?page=home'>Home</a></li>
  <li role='presentation'><a href='?page=profile'>Profile</a></li>
  <li role='presentation'><a href='?page=search'>Search</a></li>
  <li role='presentation'><a href='?page=logout'>Logout</a></li>
</ul>";

$out .= "<div class='row'>
<div class='col-md-2'>";
    //LEFT COLUMN content below

$out .= "</div>
<div class='col-md-8'>";
    //MIDDLE COLUMN content below


echo $out;

?>
