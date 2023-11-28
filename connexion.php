<?php
$server = 'localhost';
$port = '8889'; 
$db = 'ecom1_projet';
$userName = 'root';
$pwd = '';

$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';


$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {
    //echo "Connected to the $db database successfully";
    global $conn;
} else {
    echo "Error : Not connected to the $db database";
}
?>