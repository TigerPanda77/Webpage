<?php
$servername = "btlqpckfuth52y5zn4ue-mysql.services.clever-cloud.com";
$username = "u07mcepopweif4ln";
$password = "7b8cboTnbOj8Dx062nSE";
$dbname = "btlqpckfuth52y5zn4ue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$newUsername = $_POST['newUsername'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

if ($newPassword != $confirmPassword) {
    echo "Passwords do not match!";
    exit;
}

// Hash the password before storing it
$hashed_password = hash('sha256', $newPassword);

$sql = "INSERT INTO user_profile (Username, First_Name, Last_Name, Email, Password) VALUES ('$newUsername', '$firstName', '$lastName', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New profile created successfully!";
    // Redirect to login page or another page
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>