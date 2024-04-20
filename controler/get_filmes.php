<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblocadora";
$sql = "SELECT * FROM filmes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $filmes = array();

    while($row = $result->fetch_assoc()) {
        $filmes[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($filmes);
} else {
    echo json_encode(array()); 
}

$conn->close();
?>
