<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cs305database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

// Hash the password for comparison
$hashed_pass = hash('sha256', $pass);

$sql = "SELECT * FROM users WHERE username='$user' AND password='$hashed_pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $user;
    echo "Login successful!";
    // Redirect to user profile page or another page
} else {
    echo "Invalid credentials";
}

$conn->close();
?>