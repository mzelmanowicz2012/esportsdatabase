<?php
require_once 'header.php';

if (!$loggedin)
{
    require_once 'footer.php';
    die();
}

$tgame = '';

if (isset($_GET['game']))
{
    $tgame = sanitizeString($_GET['game']);

    echo"
    <form action='./tournaments.php' method='GET'>
        Filter by game: <input type='text' name='game' value='$tgame'>
        <input type='submit' value='Search'>
    </form><a href='./tournaments.php'>Remove filter</a>.<br>";

    $result = queryMysql("SELECT * FROM tournament t, gameuse u, game g WHERE t.t_id = u.t_id AND u.g_id = g.g_id and g.title = '$tgame' ORDER BY t.start_date DESC");      
    if (!$result->num_rows)
    {
        echo "<p>No tournaments with this game!</p><br>";
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
        $output = '<table>
    <tr>
        <th>Game</th>
        <th>Tournament</th>
        <th>Location</th>
        <th>Organizer</th>
        <th>Start Date</th>
    </tr>
  ';
        while($row = $result->fetch_assoc())
        {
            $output = $output . '  <tr>
        <td>' . $row['title'] . '</td>
        <td>' . $row['t_name'] . '</td>
        <td>' . $row['location'] . '</td>
        <td>' . $row['organizer'] . '</td>
        <td>' . $row['start_date'] . '</td>
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
    <form action='./tournaments.php' method='GET'>
        Search by game: <input type='text' name='game'>
        <input type='submit' value='Search'>
    </form>";


$result = queryMysql("SELECT * FROM tournament t ORDER BY t.start_date DESC");      
if (!$result->num_rows)
{
    echo "<p>No tournaments! Something probably went wrong.</p><br>";
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
        <th>Tournament</th>
        <th>Location</th>
        <th>Organizer</th>
        <th>Start Date</th>
    </tr>
  ';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '  <tr>
        <td>' . $row['t_name'] . '</td>
        <td>' . $row['location'] . '</td>
        <td>' . $row['organizer'] . '</td>
        <td>' . $row['start_date'] . '</td>
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

