<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hashed_password);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: index.html");
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with this email.";
}

$stmt->close();
$conn->close();
?>
