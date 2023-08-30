<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dangki";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student ID from the request
$id = $_GET["id"];

// Query to get the score for the student with the given ID
$sql = "SELECT subject, score FROM users WHERE id = '$id'";

// Execute the query
$result = $conn->query($sql);

// Check if there is a result
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Subject: " . $row["subject"]. "<br>Score: " . $row["score"]. "<br>";
  }
} else {
    echo "No results found";
}

// Close the database connection
$conn->close();
?>