<?php
// Replace these with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pawprint";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function updateShelter($shelter_id, $name, $address, $info, $price) {
    global $conn; // Access the global database connection

    // Prepare a SQL query to update shelter information
    $sql = "UPDATE shelter_info SET name=?, address=?, info=?, price=? WHERE shelter_id=?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssi", $name, $address, $info, $price, $shelter_id);

    // Execute the query
    if ($stmt->execute()) {
        // The update was successful
        return true;
    } else {
        // The update failed
        return false;
    }
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $shelter_id = $_POST["shelter_id"];
    $new_name = $_POST["new_name"];
    $new_address = $_POST["new_address"];
    $new_info = $_POST["new_info"];
    $new_price = $_POST["new_price"];

    // Update the shelter information in the database
    if (updateShelter($shelter_id, $new_name, $new_address, $new_info, $new_price)) {
        // The update was successful, you can redirect or display a success message
        header("Location: confirmation.php");
        exit;
    } else {
        // The update failed, handle the error as needed
        echo "Error updating shelter information.";
    }
}

// Close the database connection when done (recommended)
$conn->close();
?>
