<?php
session_start();

/* ---------- DB CONFIG ---------- */
$conn = new mysqli("localhost", "root", "", "kp_telemed", 3307);
if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

/* ---------- SESSION CHECK ---------- */
if (empty($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

/* ---------- REQUEST CHECK ---------- */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: Account_Details.html");
    exit();
}

/* ---------- DATA ---------- */
$user_id     = (int) $_SESSION['user_id'];
$age         = (int) ($_POST['age'] ?? 0);
$gender      = $_POST['gender'] ?? '';
$history     = $_POST['history'] ?? '';
$allergies   = $_POST['allergies'] ?? '';
$medications = $_POST['medications'] ?? '';
$height      = (float) ($_POST['height'] ?? 0);
$weight      = (float) ($_POST['weight'] ?? 0);
$emergency   = $_POST['emergency'] ?? '';

/* ---------- PREPARE ---------- */
$stmt = $conn->prepare(
    "INSERT INTO user_details
    (user_id, age, gender, history, allergies, medications, height, weight, emergency)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

if (!$stmt) {
    die("Prepare Failed: " . $conn->error);
}

/* ---------- BIND ---------- */
$stmt->bind_param(
    "iissssdds",
    $user_id,
    $age,
    $gender,
    $history,
    $allergies,
    $medications,
    $height,
    $weight,
    $emergency
);

/* ---------- EXECUTE ---------- */
if ($stmt->execute()) {
    header("Location: login.html");
    exit();
} else {
    die("Insert Failed: " . $stmt->error);
}

/* ---------- CLOSE ---------- */
$stmt->close();
$conn->close();
