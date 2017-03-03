<?php
$out = "<form action='index.php?page=home' method='POST' class='form-horizontal'>
      <div class='form-group'>
        <label for='post'>Create a post</label>
        <textarea class='form-control' rows='2' name='post'></textarea>
        <input type='file' id='image'>
      </div>
      <button type='submit' name='action' class='btn btn-default'>Post</button>
    </form>";
    
echo $out;
?>