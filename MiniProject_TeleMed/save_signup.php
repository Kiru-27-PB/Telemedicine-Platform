<?php
$conn = new mysqli("localhost", "root", "", "medkare");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$account = $_POST['account'];

$sql = "INSERT INTO users (username, email, password, account_type)
        VALUES ('$username', '$email', '$password', '$account')";

$conn->query($sql);

// Redirect based on account type
if ($account == "patient") {
    header("Location: details_user.php");
} else if ($account == "doctor") {
    header("Location: details_doctor.html");
} else if ($account == "nurse") {
    header("Location: details_nurse.html");
} else {
    header("Location: details_support.html");
}
?>
