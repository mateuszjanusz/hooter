<?php

$out = "<form method='post' action='index.php?page=login' class='form-horizontal'>
  <div class='form-group'>
    <label for='email' class='col-sm-2 control-label'>Email</label>
    <div class='col-sm-10'>
      <input type='email'' class='form-control' name='email'required />
    </div>
  </div>
  <div class='form-group'>
    <label for='password' class='col-sm-2 control-label'>Password</label>
    <div class='col-sm-10'>
      <input type='password' class='form-control'' name='password' required />
    </div>
  </div>
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <button type='submit' name='login' class='btn btn-default'>Sign in</button>
    </div>
  </div>
</form>";


echo $out;
?>