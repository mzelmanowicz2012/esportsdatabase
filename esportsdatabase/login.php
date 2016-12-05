<?php 
  require_once 'header.php';
  $error = $user = $pass = $token = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $token = hash('ripemd128',$pass);
    
    if ($user == "" || $token == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT u_name,u_psswrd FROM user
        WHERE u_name='$user' AND u_psswrd='$token'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  combination invalid</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $token;
        die("<br><p>Logging in... <br>If this page does not redirect, <a href='index.php'>click here</a> to continue.</p><br><br><meta http-equiv='refresh' content='0;url=index.php' />");
      }
    }
  }

echo <<<_END
    <div id="formParent">
        <form class="form-horizontal" method='post' action='login.php'>$error
            <p>Please enter your information to log in:</p>
            <span class='fieldname'>Username</span><input type='text' maxlength='16' name='user' value='$user' required><br>
            <span class='fieldname'>Password</span><input type='password' maxlength='16' name='pass' value='$pass' required>
            <br>
            <input type='submit' value='Login'>
        </form>
    </div>

<br>
_END;
require_once 'footer.php';
?>
