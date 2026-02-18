<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "kp_telemed";

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

// Collect POST data
$username   = $_POST['username'];
$age        = $_POST['age'];
$gender     = $_POST['gender'];
$history    = $_POST['history'];
$allergies  = $_POST['allergies'];
$medications= $_POST['medications'];
$height     = $_POST['height'];
$weight     = $_POST['weight'];
$emergency  = $_POST['emergency'];

// Proper SQL INSERT query
$sql = "INSERT INTO user_details 
(user_id, age, gender, history, allergies, medications, height, weight, emergency)
VALUES 
('$user_id', '$age', '$gender', '$history', '$allergies', '$medications', '$height', '$weight', '$emergency')";

if ($conn->query($sql) === TRUE) {
    header("Location: user_account.html");
    exit();

} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
