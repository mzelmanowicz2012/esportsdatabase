<?php
require_once 'header.php';

if (!$loggedin)
{
    require_once 'footer.php';
    die();
}

$gdev = '';

if (isset($_GET['dev']))
{
    $gdev = sanitizeString($_GET['dev']);

    echo"
    <form action='./games.php' method='GET'>
        Filter by developer: <input type='text' name='dev' value='$gdev'>
        <input type='submit' value='Search'>
    </form><a href='./games.php'>Remove filter</a>.<br>";

    $result = queryMysql("SELECT * FROM game g WHERE g.developer = '$gdev' ORDER BY g.title");      
    if (!$result->num_rows)
    {
        echo "<p>No games by this developer!</p><br>";
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
        <th>Title</th>
        <th>Developer</th>
        <th>Release Date</th>
        <th>Tournaments</th>
    </tr>
  ';
        while($row = $result->fetch_assoc())
        {
            $output = $output . '  <tr>
        <td>' . $row['title'] . '</td>
        <td>' . $row['developer'] . '</td>
        <td>' . $row['release_date'] . '</td>
        <td><a href="./tournaments.php?game='. $row['title'] .'">See list</a></td>
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
    <form action='./games.php' method='GET'>
        Filter by developer: <input type='text' name='dev'>
        <input type='submit' value='Search'>
    </form>";


$result = queryMysql("SELECT * FROM game g ORDER BY g.title");      
if (!$result->num_rows)
{
    echo "<p>No games! Something probably went wrong.</p><br>";
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
        <th>Title</th>
        <th>Developer</th>
        <th>Release Date</th>
        <th>Tournaments</th>
    </tr>
  ';
    while($row = $result->fetch_assoc())
    {
        $output = $output . '  <tr>
        <td>' . $row['title'] . '</td>
        <td>' . $row['developer'] . '</td>
        <td>' . $row['release_date'] . '</td>
        <td><a href="./tournaments.php?game='. $row['title'] .'">See list</a></td>
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

