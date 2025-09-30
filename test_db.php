<?php 
include 'config.php';

$result = $conn->query("SHOW TABLES");

if ($result) {
    echo "Connected : Tables in DB:<br>";
    while ($row = $result->fetch_array()) {
        echo $row[0] ."<br>";
    } 
} else { 
    echo "Error" . $pdo->errorCode();
}

?>