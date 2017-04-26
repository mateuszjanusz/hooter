<?php
$out = "<form enctype='multipart/form-data' action='index.php?page=home' method='POST' class='form-horizontal'>
      <div class='form-group'>
        <textarea class='form-control' rows='2' name='post' placeholder='Create a post...'></textarea>
        <input type='file' name='image'>
      </div>
      <button type='submit' name='action' class='btn btn-default'>Post</button>
    </form>";
    
echo $out;
?>
