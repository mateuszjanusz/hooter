<?php

if( isset($registerFormMessage) === false ) {
    $registerFormMessage = "";
}

$out = "<form class='form-horizontal' action='index.php?page=new_user' method='POST'>
  <fieldset>
    <div id='legend'>
      <legend class=''>Register</legend>
    </div>
    <div class='control-group'>
      <!-- Username -->
      <label class='control-label'  for='username'>Username</label>
      <div class='controls'>
        <input type='text' name='username' class='input-xlarge'>
      </div>
    </div>
 
    <div class='control-group'>
      <!-- E-mail -->
      <label class='control-label' for='email'>Email</label>
      <div class='controls'>
        <input type='email' name='email' class='input-xlarge'>
      </div>
    </div'
 
    <div class='control-group'>
      <!-- Password-->
      <label class='control-label' for='password'>Password</label>
      <div class='controls'>
        <input type='password' name='password' class='input-xlarge'>
      </div>
    </div>
 
    <div class='control-group'>
      <!-- Password -->
      <label class='control-label' for='password_confirm'>Confirm password</label>
      <div class='controls'>
        <input type='password' name='password_confirm' class='input-xlarge'>
      </div>
    </div>
 
    <div class='control-group'>
      <!-- Button -->
      <div class='controls'>
        <button type='submit' name='registerUser' class='btn btn-success'>Register</button>
      </div>
    </div>
    <p id='register-form-message' class='help-block'>$registerFormMessage</p>
  </fieldset>
</form>";
    
echo $out;
?>