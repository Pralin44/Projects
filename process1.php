<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully.<br>";

            // Use the full path to Python
            $python_path = 'C:\Users\ACER\AppData\Local\Programs\Python\Python311\python.exe'; // Change this to the actual path
            $command = escapeshellcmd($python_path . ' process_image.py ' . escapeshellarg($target_file) . ' 2>&1');
            echo "Running command: $command<br>";

            $output = shell_exec($command);
            if ($output === null) {
                echo "Error executing Python script.<br>";
            } else {
                // Convert output to UTF-8 encoding if necessary
                $output = iconv(mb_detect_encoding($output, mb_detect_order(), true), "UTF-8", $output);
                echo "Python script output:<br><pre>$output</pre>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "No file uploaded.";
}
?>
