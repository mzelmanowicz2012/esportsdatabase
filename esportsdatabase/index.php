<?php
  require_once 'header.php';

  if ($loggedin)
  {
      
      echo "<br>
<div>
    <h3>Welcome to $appname!</h3>
    <p>$appname is a place where you can keep track of eSports tournamants, players, and more!</p>
</div>";
            require_once 'footer.php';
            die();
  }
  else
  {
      echo "<br>
<div>
    <h3>Welcome to $appname!</h3>
    <p>$appname is a place where you can keep track of eSports tournamants, players, and more!</p>
</div>
<div>
    <br>
    <p>Please <a href='./signup.php'>sign up</a> or log in!</p>
    <br>
    <p>Log in:<p>
    <form class='form-horizontal' method='post' action='login.php'>
    <span class='fieldname'>Username</span><input type='text' maxlength='16' name='user' value='' required><br>
    <span class='fieldname'>Password</span><input type='password' maxlength='16' name='pass' value='' required>
    <br>
    <input type='submit' value='Login'>
    </form>
    <br>
</div>";
  }
    echo "<br><br>";
    require_once 'footer.php';
?>

