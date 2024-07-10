<?php 

$cssFilePath = 'style.css';

echo '<link rel="stylesheet" type="text/css" href="' . $cssFilePath . '">';

// Handle shelter removal here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shelter_id = $_POST["shelter_id"];

    // Perform database delete
    $conn = new mysqli("localhost", "root", "", "pawprint");
    $sql = "DELETE FROM shelter_info WHERE shelter_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $shelter_id);
    if ($stmt->execute()) {
        echo "Shelter removed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
<!-- Create a HTML form for removing a shelter -->
<form method="post" action="remove_shelter.php" style="margin-left:4in; margin-right:4in; margin-top:2in;">
    <label for="shelter_id">Shelter ID:</label>
    <input type="text" name="shelter_id" required>
    <input type="submit" value="Remove Shelter">
</form>
