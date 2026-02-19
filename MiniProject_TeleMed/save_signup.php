<?php
session_start();

$conn = new mysqli("localhost", "root", "", "kp_telemed", 3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password']; // (hash later)
$account  = $_POST['accType'];

/* ---------- INSERT USER ---------- */
$stmt = $conn->prepare(
    "INSERT INTO users (username, email, password, account_type)
     VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssss", $username, $email, $password, $account);

if ($stmt->execute()) {

    
    $_SESSION['user_id'] = $stmt->insert_id;

    
    if ($account === "user") {
        header("Location: Account_Details.html");
    } elseif ($account === "doctor") {
        header("Location: doctor_details.html");
    } elseif ($account === "nurse") {
        header("Location: nurse_details.html");
    } else {
        header("Location: support_details.html");
    }
    exit();

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
