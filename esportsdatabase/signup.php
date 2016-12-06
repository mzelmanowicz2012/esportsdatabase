<?php
  require_once 'header.php';

  echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
_END;

  $error = $user = $pass = $email = $token = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $email = sanitizeString($_POST['email']);
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $token = hash('ripemd128',$pass);
    $utype = sanitizeString($_POST['u_type']);

    if ($user == "" || $pass == "")
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM user WHERE u_name='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
        queryMysql("INSERT INTO user VALUES('', '$email', '$user', '$token', '$utype')");
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $token;
        die("<br><p>Logging in... <br>If this page does not redirect, <a href='index.php'>click here</a> to continue.</p><br><br><meta http-equiv='refresh' content='0;url=index.php' />");
      }
    }
  }

echo <<<_END
    <div id="formParent">
        <form class="form-horizontal" method='post' action='signup.php'>$error
            <p>Please enter your information to sign up:</p>
            <span class='fieldname'>Username</span><input type='text' maxlength='16' name='user' value='$user' onBlur='checkUser(this)' required><span id='info'></span><br>
            <span class='fieldname'>Password</span><input type='password' maxlength='16' name='pass' value='$pass' required><br>
            <span class='fieldname'>Email</span><input type='email' maxlength='256' name='email' value='$email' required>
            <br>
            <span class='fieldname'>Account Type:</span>
            <label for="spectator">Spectator</label><input type='radio' name='u_type' id='spectator' value='0' checked='checked'>
            <label for="player">Player</label><input type='radio' name='u_type' id='player' value='1'>
            <label for="company">Company</label><input type='radio' name='u_type' id='company' value='2'><br>
            <input type='submit' value='Sign up'>
        </form>
    </div>
<br>
_END;
require_once 'footer.php';
?>
