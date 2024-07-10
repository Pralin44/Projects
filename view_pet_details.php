<!DOCTYPE html>
<html>
<head>
    <title>Pet Details</title>
    <style>
        /* Dark theme */
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            color: #f0f0f0;
        }

        /* Container for pet details */
        .pet-details {
            max-width: 800px;
            margin: 0 auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }

        /* Style for the pet image */
        .pet-details img {
            max-width: 500px;
            height: auto;
            display: block;
            margin: 10px auto;
            border-radius: 10px;
        }

        /* Style for paragraphs */
        p {
            margin: 10px 0;
        }

        /* Style for links */
        a {
            color: #0099cc;
            text-decoration: none;
        }

        /* Style for links on hover */
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="pet-details">
        <?php
        
        // Database configuration
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "pawprint"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the pet ID from the URL
$pet_id = $_GET["id"];

// Retrieve the pet details based on the ID
$sql = "SELECT * FROM pets WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $pet_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<h2>' . $row["name"] . '</h2>';
    echo '<img src="' . $row["image"] . '" alt="Pet Image">';
    echo '<p>Breed: ' . $row["breed"] . '</p>';
    echo '<p>Description: ' . $row["description"] . '</p>';
    echo '<p>Contact Info: ' . $row["contact_info"] . '</p>';
    echo '<p>Address: ' . $row["address"] . '</p>';
} else {
    echo 'Pet not found.';
}

// Close the database connection
$conn->close();
        ?>
    </div>
</body>
</html>
