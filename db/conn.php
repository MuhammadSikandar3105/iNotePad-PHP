<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'inotebook';


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo'connection faild'. $conn->connect_error;
}

?>