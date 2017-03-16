<?php

if( isset($registerFormMessage) === false ) {
    $registerFormMessage = "";
}

$out = "<form method='POST' class='form-horizontal' action='index.php?page=new_user'>
    <div id='legend'>
      <legend class=''>Register</legend>
    </div>

    <div class='form-group'>
      <label for='username' class='col-sm-2 control-label'>Username</label>
      <div class='col-sm-8'>
        <input type='text' class='form-control' name='username'>
      </div>
    </div>
 
    <div class='form-group'>
      <label for='email' class='col-sm-2 control-label'>Email</label>
      <div class='col-sm-8'>
        <input type='email' class='form-control' name='email'>
      </div>
    </div>
 
    <div class='form-group'>
      <label for='password' class='col-sm-2 control-label'>Password</label>
      <div class='col-sm-8'>
        <input type='password' class='form-control' name='password'>
      </div>
    </div>
 
    <div class='form-group'>
      <label for='password_confirm' class='col-sm-2 control-label'>Confirm password</label>
      <div class='col-sm-8'>
        <input type='password' class='form-control' name='password_confirm'>
      </div>
    </div>
 
    <div class='form-group'>
      <!-- Button -->
      <div class='col-sm-offset-2 col-sm-10'>
        <button type='submit' name='registerUser' class='btn btn-success'>Register</button>
      </div>
    </div>

    <p id='register-form-message' class='help-block'>$registerFormMessage</p>

</form>";
    
echo $out;
?>