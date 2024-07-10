
<?php
session_start();
// Database configuration
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "pawprint"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pet_id = $_POST["pet_id"];

    // Update the status of the pet in the database as "refused"
    $sql = "UPDATE pets SET status = 'refused' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pet_id);
    if ($stmt->execute()) {
        header("Location: admin_index.php"); // Redirect back to the admin panel
        exit;
    } else {
        echo "Failed to refuse the pet request. Please try again.";
    }
}

$conn->close();
?>