<?php
$out = "<div class='row'>
          <div class='col-md-10'>
              <form enctype='multipart/form-data' action='index.php?page=home' method='POST' class='form-horizontal'>
                  <div class='form-group'>
                    <textarea class='form-control' rows='2' name='post' placeholder='Create a post...'></textarea>
                    <input type='file' name='image'>
                  </div>
              </form>
          </div>
          <div class='col-md-2'>
                <button type='submit' name='action' class='btn btn-default btn-lg'>Submit</button>
          </div>
        </div>";
    
echo $out;
?>
