<?php
require_once 'header.php';

if (!$loggedin)
{
    require_once 'footer.php';
    die();
}

$spcomp = '';

if (isset($_GET['company']))
{
    $spcomp = sanitizeString($_GET['company']);

    echo"
    <form action='./playersponsorships.php' method='GET'>
        Filter by company: <input type='text' name='company' value='$spcomp'>
        <input type='submit' value='Search'>
    </form><a href='./playersponsorships.php'>Remove filter</a>.<br>";

    $result = queryMysql("SELECT * FROM player p, p_sponsorship s, company c WHERE p.p_id = s.p_id AND s.comp_id = c.comp_id AND c.c_name = '$spcomp' ORDER BY c.c_name");

    if (!$result->num_rows)
    {
        echo "<p>No sponsorships by this company!</p><br>";
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
        <th>Company</th>
        <th>Player</th>
    </tr>
  ';
        while($row = $result->fetch_assoc())
        {
            $output = $output . '  <tr>
        <td>' . $row['c_name'] . '</td>
        <td>' . $row['p_Uname'] . '</td>
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
}

echo"
    <form action='./playersponsorships.php' method='GET'>
        Filter by company: <input type='text' name='company'>
        <input type='submit' value='Search'>
    </form>";


$result = queryMysql("SELECT * FROM player p, p_sponsorship s, company c WHERE p.p_id = s.p_id AND s.comp_id = c.comp_id ORDER BY c.c_name");

if (!$result->num_rows)
{
    echo "<p>No sponsorships! Something probably went wrong.</p><br>";
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
        <th>Company</th>
        <th>Player</th>
    </tr>
  ';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '  <tr>
        <td>' . $row['c_name'] . '</td>
        <td>' . $row['p_Uname'] . '</td>
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

