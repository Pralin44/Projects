<?php
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	$days = $_POST['days'];
	$price = $_POST['hidden_price'];
	//echo $price*$days;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Page Title</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form method="POST" action="pay.php">
        <!-- First row of the form with email and password inputs -->
        <h3>Owner Information<hr></h3>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label >Email</label>
                <input type="email" class="form-control" name="inputEmail4" placeholder="Email" required>
            </div>
            <div class="form-group col-md-6">
                <label >Phone Number</label>
                <input type="text" class="form-control" name="phnumber" placeholder="Phone Number" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label >Address</label>
            <input type="text" class="form-control"  name="inputAddress" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address 2</label>
            	<input type="text" class="form-control" name="inputAddress2" placeholder="">
            </div>
        </div>

        <!-- Address input fields -->
  
        <h3>Dog Information<hr></h3>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Dog Name</label>
                <input type="text" class="form-control" name="dogname" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label >Dog Gender</label>
                <input type="text" class="form-control" name="doggender" placeholder="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label >Dog Breed</label>
			<select name="dogbreed" class="form-control" required>
    		<option selected disabled>Choose...</option>
    		<option>Labrador Retriever</option>
    		<option>German Shepherd</option>
    		<option>Golden Retriever</option>
    		<option>Bulldog</option>
   			<option>Poodle</option>
    		<option>Beagle</option>
    		<option>Rottweiler</option>
    		<option>Boxer</option>
    		<option>Dachshund</option>
    		<option>Shih Tzu</option>
    		<option>Doberman</option>
    		<option>Siberian Husky</option>
    		<option>Great Dane</option>
    		<option>Pug</option>
    		<option>Chihuahua</option>
    		<option>Border Collie</option>
    		<option>Shetland Sheepdog</option>
    		<option>Australian Shepherd</option>
    		<option>Boston Terrier</option>
			</select>
            </div>
            <div class="form-group col-md-6">
                <label >Dog Color</label>
                <input type="text" class="form-control" name="dogcolor" placeholder="" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Dog Age</label>
                <input type="text" class="form-control" name="dogage" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label >Dog Weight</label>
                <input type="text" class="form-control" name="dogweight" placeholder="" required>
            </div>
        </div>
        <div class="form-group form-check">
    		<input type="checkbox" class="form-check-input" name="vaccinatedCheckbox">
    		<label class="form-check-label" for="vaccinatedCheckbox">Is the dog fully vaccinated?</label>
		</div>
		<div class="form-group">
    		<label>Additional Information</label>
    		<textarea class="form-control" name="additionalInfo" rows="3" placeholder="Enter any additional information about the dog"></textarea>
		</div>
        <!-- Second row of the form with city, state, and zip code inputs -->
        
        <!-- Submit button -->
        <input type="hidden" name="hidden_name" value="<?php echo $days; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $price ?>">
        <button type="submit" class="btn btn-primary">Proceed</button>
    </form>
</div>

<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
