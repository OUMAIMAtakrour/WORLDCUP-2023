<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "myfirstdatabase";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    // If you reach this point, the connection was successful
    echo "Connected successfully";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teams_table = $_POST['teams_table'];
    $sql = "SELECT teams_id ,team_name, team_coach, nbr_players, country FROM $teams_table";
    $run = $conn->query($sql) or die($conn->error);

    while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['teams_id'] . "</td>";
        echo "<td>" . $row['team_name'] . "</td>";
        echo "<td>" . $row['team_coach'] . "</td>";
        echo "<td>" . $row['nbr_players'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "</tr>";
    };
}
