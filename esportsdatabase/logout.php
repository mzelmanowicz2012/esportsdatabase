<?php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<br><p>Logging out...<br>If this page does not redirect, <a href='index.php'>click here</a> to continue.</p><br><br><meta http-equiv='refresh' content='0;url=index.php' />";
  }
  else echo "<p>Logout Failed! You need to be logged in to log out.<br> Please log in to log out.</p><br><br>";
    require_once 'footer.php';
?>
