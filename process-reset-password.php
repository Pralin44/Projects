<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}


if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password = $_POST["password"];

$sql = "UPDATE users
        SET password= ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $password, $user["id"]);

$stmt->execute();

if ($stmt->execute()) {
    echo "Your password has been reset successfully.";
    
    // Redirect to the home page (index.php)
    header("Location: login.php");
    exit; // Make sure to exit to prevent further script execution
} else {
    echo "An error occurred while resetting your password.";
}