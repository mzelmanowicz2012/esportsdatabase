<?php
require_once 'header.php';

if (!$loggedin)
{
    require_once 'footer.php';
    die();
}


$result = queryMysql("SELECT * FROM company c ORDER BY c_name");      
if (!$result->num_rows)
{
    echo "<p>No companies! Something probably went wrong.</p><br>";
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
        <th>Company Name</th>
        <th>Players Sponsored</th>
        <th>Tournaments Sponsored</th>
    </tr>
  ';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '  <tr>
        <td>' . $row['c_name'] . '</td>
        <td><a href="./playersponsorships.php?company='. $row['c_name'] .'">See list</a></td>
        <td><a href="./tournamentsponsorships.php?company='. $row['c_name'] .'">See list</a></td>
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

