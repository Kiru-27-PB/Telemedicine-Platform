<?php
session_start();
$_SESSION['user_id'] = $row['id'];
$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "kp_telemed";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];
$type = $_POST['accountType'];

$sql = "SELECT * FROM user_details WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Redirect based on account type selection
    if ($type == "user") {
        header("Location: users_account.html");
    } 
    else if ($type == "doctor") {
        header("Location: doctor_account.html");
    } 
    else if ($type == "nurse") {
        header("Location: nurse_account.html");
    } 
    else if ($type == "support") {
        header("Location: support_account.html");
    }
    exit();
} else {
    echo "<script>alert('Invalid username or password!'); window.location.href='login.html';</script>";
}

$conn->close();
?>
