<?php
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
    $name = $_POST["name"];
    $breed = $_POST["breed"];
    $description = $_POST["description"];
    $contactInfo = $_POST["contact_info"]; // New field for contact info
    $shortDesc = $_POST["short_desc"]; // New field for short description
    $address = $_POST["address"]; // New field for address

   
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $target_dir = "Admin/uploads/"; // Folder to store uploaded images
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        // Check if the file already exists
        if (file_exists($target_file)) {
            die("Sorry, the file already exists.");
        }

        // Limit the image size (5MB)
        if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
            die("Sorry, your file is too large.");
        }

        // Allow only certain image file types (you can extend this list)
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif","webp"])) {
            die("Sorry, only JPG, JPEG, PNG, GIF and WEBP files are allowed.");
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die("Sorry, there was an error uploading your file.");
        }

        // Store the pet information in the database
        $sql = "INSERT INTO pets (image, name, breed, description, contact_info, short_desc, address, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $target_file, $name, $breed, $description, $contactInfo, $shortDesc, $address);
        if ($stmt->execute()) {
            echo "Pet registration successful!";
        } else {
            echo "Failed to register the pet. Please try again.";
        }
    } else {
        echo "Pet image is required.";
    }
}

$conn->close();