<?php
require 'vendor/autoload.php'; // Include PHPMailer autoload file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$server="localhost";
$username="root";
$password="";
$dbname="pawprint";


$conn=mysqli_connect($server, $username,$password,$dbname);
function sanitizeData($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize
    $fullName = sanitizeData($_POST['fullName']);
    $address = sanitizeData($_POST['address']);
    $phoneNumber = sanitizeData($_POST['phoneNumber']);
    $emailAddress = sanitizeData($_POST['emailAddress']);
    $residenceType = sanitizeData($_POST['residenceType']);
    $ownershipStatus = sanitizeData($_POST['ownershipStatus']);
    $landlordContact = sanitizeData($_POST['landlordContact']);
    $petRestrictions = sanitizeData($_POST['petRestrictions']);
    $income = sanitizeData($_POST['income']);
    $employmentStatus = sanitizeData($_POST['employmentStatus']);
    $adoptionReason = sanitizeData($_POST['adoptionReason']);
    $careExpectations = sanitizeData($_POST['careExpectations']);
    $provideProperCare = isset($_POST['provideProperCare']) ? 1 : 0;
    $spayingNeutering = isset($_POST['spayingNeutering']) ? 1 : 0;
    $homeVisitInterview = isset($_POST['homeVisitInterview']) ? 1 : 0;
    $adoptionFee = isset($_POST['adoptionFee']) ? sanitizeData($_POST['adoptionFee']) : null;
    $legalAgreement = isset($_POST['legalAgreement']) ? 1 : 0;

    // Insert data into the database
    $sql = "INSERT INTO adopter_info (full_name, address, phone_number, email_address, residence_type, ownership_status, landlord_contact, pet_restrictions, income, employment_status, adoption_reason, care_expectations, provide_proper_care, spaying_neutering, home_visit_interview, adoption_fee, legal_agreement)
            VALUES ('$fullName', '$address', '$phoneNumber', '$emailAddress', '$residenceType', '$ownershipStatus', '$landlordContact', '$petRestrictions', '$income', '$employmentStatus', '$adoptionReason', '$careExpectations', $provideProperCare, $spayingNeutering, $homeVisitInterview, $adoptionFee, $legalAgreement)";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully

        // Use PHPMailer to send an email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Change this to your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'kenshinrogu@gmail.com'; // Change this to your email address
            $mail->Password = 'uvix turm mbgv jbrq';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('kenshinrogu@gmail.com', 'Pralin Rogu'); // Change this to your email and name
            $mail->addAddress($emailAddress, $fullName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Adoption Form Submission';
            $mail->Body = 'Thank you for submitting the adoption form. We will review your information and get back to you soon.';

            $mail->send();
            echo 'Email sent successfully';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $conn->close(); // Close the database connection
}
?>
