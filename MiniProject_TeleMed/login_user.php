<?php
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "kp_telemed";

$conn = new mysqli(
    hostname: $servername,
    username: $usernameDB,
    password: $passwordDB,
    database: $dbname,
    port: 3307
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];
$type = $_POST['accountType'];

$sql = "SELECT * FROM users 
        WHERE username = '$user' 
        AND password = '$pass' 
        AND account_type = '$type'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    if ($type == "user") {
        header("Location: users_account.html");
    } 
    else if ($type == "doctor") {
        header("Location: doctor_account.html");
    } 
    else if ($type == "nurse") {
        header("Location: nurse_account.html");
    } 
    else {
        header("Location: support_account.html");
    }
    exit();

} else {
    echo "<script>
            alert('Invalid username or password');
            window.location.href = 'login.html';
          </script>";
}

$conn->close();
?>
