<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed : " . mysqli_connect_error());
    }

    
?>