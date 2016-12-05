<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  echo <<<_END
  <head>
    <title>$appname$userstr</title>
    
    <!-- A header that appears no matter what. Normal header stuff like bootstrap files, etc. go here -->
    
    
    <script src='javascript.js'></script>
    
  </head>
_END;

  if ($loggedin)
  {
    echo <<<_END
    <header>
    
        <!-- A header/navigation that appears when the user is logged in -->
        <p>Click <a href='./logout.php'>here</a> to log out.</p>
        
    </header>
    
_END;
  }
  else
  {
    echo <<<_END
<!-- Navigation -->
    <header>
    
        <!-- A header/navigation that appears when the user is not logged in -->
        
    </header>
    
_END;
    echo ("This message from header.php only appears if the user is not logged in. It asks the user to <a href='./login.php'>log in</a> or <a href='./signup.php'>sign up</a>!");
  }
?>
