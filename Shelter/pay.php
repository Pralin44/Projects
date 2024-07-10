<?php
$server="localhost";
$username="root";
$password="";
$dbname="pawprint";


$conn=mysqli_connect($server, $username,$password,$dbname);
//for to check the connection of data base

/*
if(!$conn){
 echo("db did not connect");    
 die();

}
else{
    echo("DBconnected");
}*/
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	$days = $_POST['hidden_name'];
	$price = $_POST['hidden_price'];
	$total = $days * $price;
	//echo $price;

	 // Owner Information
    $email = $_POST["inputEmail4"];
    $phoneNumber = $_POST["phnumber"];
    $address1 = $_POST["inputAddress"];
    $address2 = $_POST["inputAddress2"];

    // Dog Information
    $dogName = $_POST["dogname"];
    $dogGender = $_POST["doggender"];
    $dogBreed = $_POST["dogbreed"];
    $dogColor = $_POST["dogcolor"];
    $dogAge = $_POST["dogage"];
    $dogWeight = $_POST["dogweight"];
    $fullyVaccinated = isset($_POST["vaccinatedCheckbox"]) ? 1 : 0;
    $additionalInfo = $_POST["additionalInfo"];

    // Insert data into the database
    $sql = "INSERT INTO book_info (email, phone_number, address1, address2, dog_name, dog_gender, dog_breed, dog_color, dog_age, dog_weight, fully_vaccinated, additional_info)
            VALUES ('$email', '$phoneNumber', '$address1', '$address2', '$dogName', '$dogGender', '$dogBreed', '$dogColor', '$dogAge', '$dogWeight', '$fullyVaccinated', '$additionalInfo')";

    if (mysqli_query($conn, $sql)) {
        //echo "Record added successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checkout Page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container text-center mt-5">
		
						<div class="col-md-12" align="center">
							<h3>Pay With</h3>
							<ul class="list-group">
								<li class="list-group-item">
									<form action="https://uat.esewa.com.np/epay/main" method="POST">
										<input value="<?php echo $total;?>" name="tAmt" type="hidden">
										<input value="<?php echo $total;?>" name="amt" type="hidden">
										<input value="0" name="txAmt" type="hidden">
										<input value="0" name="psc" type="hidden">
										<input value="0" name="pdc" type="hidden">
										<input value="epay_payment" name="scd" type="hidden">
										<input value="<?php echo $invoice_no;?>" name="pid" type="hidden">
										<input value="http://tandubhai.com/esewa/esewa_payment_success.php" type="hidden" name="su">
										<input value="http://tandubhai.com/esewa/esewa_payment_failed.php" type="hidden" name="fu">
										<input type="image" src="img/esewa.png">
										</li>
										<li class="list-group-item"><input type="image" src="img/fonepay.png"></li>
										<li class="list-group-item"><input type="image" src="img/khalti.png"></li>
										<li class="list-group-item"><input type="image" src="img/connectips.png"></li>
										<li class="list-group-item"><input type="image" src="img/hbl.png"></li>
									</ul>
						</div>
				</div>
			</body>
		</html>