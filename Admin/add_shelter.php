<?php
// Handle form submission here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $img = $_POST["img"];
    $address = $_POST["address"];
    $info = $_POST["info"];
    $price = $_POST["price"];
    $capacity = $_POST["capacity"];

    // Perform database insert
    $conn = new mysqli("localhost", "root", "", "pawprint");
    $sql = "INSERT INTO shelter_info (name, img, address, info, price, capacity, occupied) VALUES (?, ?, ?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $name, $img, $address, $info, $price, $capacity);
    if ($stmt->execute()) {
        echo "Shelter added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shelter</title>
</head>
<link rel="stylesheet" href="../style.css">
<style>
    /* Reset some default styles for better consistency */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f4f4f4;
}

/* Container for the content */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-top: 20px;
}

/* Page heading */
h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Form styles */
form {
    margin-top: 20px;
}

/* Form fields */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius
}
</style>
<body>
    <center><h2>Add Shelter</h2></center>
    <form method="post" action="add_shelter.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="img">Image URL:</label>
        <input type="text" name="img" id="img"><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br><br>

        <label for="info">Info:</label>
        <textarea name="info" id="info" rows="4" cols="50"></textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01"><br><br>

        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" id="capacity" required><br><br>

        <input type="submit" value="Add Shelter">
    </form>
</body>
</html>

