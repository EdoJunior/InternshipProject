<?php
/**
 * Created by IntelliJ IDEA.
 * User: ClOwNzInZiSkYzZz
 * Date: 7/19/2016
 * Time: 8:18 AM
 */

/**  $dbhost
$dbhost= 'localhost';
$dbuser= 'root';
$dbpw='';

$conn = mysqli_connect($dbhost,$dbuser,$dbpw);
$db = mysqli_select_db($conn,'bankclient');
$sql = 'SHOW TABLES';
$sql2 = 'SHOW COLUMNS FRROM';
$retval = mysqli_query($conn,$sql);
$retval2 = mysqli_query($conn,$sql2);

*/

$dbhost= 'localhost';
$dbuser = 'root';
$dbpw = '';
$dbname = 'bankclient';