<?php
require_once 'header.php';

if (!$loggedin)
{
    require_once 'footer.php';
    die();
}


$result = queryMysql("SELECT * FROM player p ORDER BY p_Uname");      
if (!$result->num_rows)
{
    echo "<p>No players! Something probably went wrong.</p><br>";
    require_once 'footer.php';
    die();
}
else
{
    if(!$result)
    {
        die('There was an error');
    }
    $num    = $result->num_rows;
    echo "Displaying $num rows.<br><br>";
    $output ='<table>
    <tr>
        <th>Player Tag</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
    </tr>
  ';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '  <tr>
        <td>' . $row['p_Uname'] . '</td>
        <td>' . $row['p_Fname'] . '</td>
        <td>' . $row['P_Lname'] . '</td>
        <td>' . $row['age'] . '</td>
    </tr>
  ';

    }
    $output = $output . '</table>';
    echo $output;
    echo "
      <br>
      ";
    require_once 'footer.php';
    die();
}


require_once 'footer.php';

?>

