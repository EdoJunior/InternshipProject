<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 7/19/2016
 * Time: 8:27 AM
 */



function connect()
{
    $config = parse_ini_file("config.ini",true);
    $db = $config['database'];

  $conn = new mysqli($db['dbhost'],$db['dbuser'],$db['dbpw'],$db['dbname']);

  if ($conn->connect_error)
  {
      die('Couldn\'t connect (' . $conn->connect_errno . '): ' . $conn->connect_error);
  }

  return $conn;
}

function closeConnection($conn){
    return $conn->connect_error;
};

function getTables()
{
    $conn = connect();

    $sql    = 'SHOW TABLES';
    $retval = $conn->query($sql);
    $rows   = $retval->fetch_all(MYSQLI_ASSOC);

    $retval->free();

    closeConnection($conn);

    return $rows;
}

function getTableColumns($table)
{
    $conn = connect();

    //if(preg_match('/^[a-z]+$/i',$table) !== 1)
    //{
    //    die("Invalid table name");
    //}

    $sql = "SELECT * FROM  $table";
    $retval = $conn->query($sql);
    $rows   = $retval->fetch_all(MYSQLI_ASSOC);

    $retval->free();

    closeConnection($conn);

    return $rows;
}

function printResultTable($rows, $id)
{
    $firstRow       = array_shift($rows);
    $columns        = array_keys($firstRow);
    $firstRowValues = array_values($firstRow);

    echo "<table id=\"$id\" class='table table-striped table-bordered table-hover'>\n";

    echo "  <thead>\n";
    echo "    <tr>\n";
    foreach($columns as $field)
    {
        echo "      <th>$field</th>\n";
    }
    echo "    </tr>\n";
    echo "  </thead>\n";

    echo "  <tbody>\n";

    echo "    <tr>\n";
    foreach($firstRowValues as $firstRowValue)
    {
        echo "      <td>$firstRowValue</td>\n";
    }
    echo "    </tr>\n";

    foreach($rows as $row)
    {
        echo "    <tr>\n";
        foreach($row as $value)
        {
            echo "      <td>$value</td>\n";
        }
        echo "    </tr>\n";
    }

    echo "  </tbody>\n";

    echo "</table>\n";
}



