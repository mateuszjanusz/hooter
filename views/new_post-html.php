<?php
$out = "<form action='index.php?page=home' method='POST' class='form-inline'>
      <div class='form-group'>
        <label for='post'>Create a post</label>
        <input type='text' class='form-control' name='post'>
      </div>
      <button type='submit' name='action' class='btn btn-default'>Post</button>
    </form>";
    
echo $out;
?>