<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <?php include 'style2.php'?>
  <title>Adoption Form</title>
</head>
<body>

<div class="container mt-5">
  <h2 style="text-align: center;">Adoption Form</h2>
  <form method="post" action="adoption_form_process.php">
    <!-- Adopter's Contact Information -->
    <h4>Adopter's Contact Information:</h4>
    <div class="form-group">
      <label for="fullName">Full Name:</label>
      <input type="text" class="form-control" id="fullName" name="fullName" required>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
      <label for="phoneNumber">Phone Number:</label>
      <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
    </div>
    <div class="form-group">
      <label for="emailAddress">Email Address:</label>
      <input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
    </div>

    <!-- Residence Details -->
    <h4>Residence Details:</h4>
    <div class="form-group">
      <label for="residenceType">Type of Residence:</label>
      <input type="text" class="form-control" id="residenceType" name="residenceType" required>
    </div>
    <div class="form-group">
      <label for="ownershipStatus">Ownership Status:</label>
      <select class="form-control" id="ownershipStatus" name="ownershipStatus" required>
        <option value="own">Own</option>
        <option value="rent">Rent</option>
      </select>
    </div>
    <div class="form-group">
      <label for="landlordContact">Landlord's Contact Information:</label>
      <input type="text" class="form-control" id="landlordContact" name="landlordContact">
    </div>
    <div class="form-group">
      <label for="petRestrictions">Any Restrictions or Rules Related to Pets:</label>
      <textarea class="form-control" id="petRestrictions" name="petRestrictions" rows="3"></textarea>
    </div>

    <!-- Financial Information -->
    <h4>Financial Information:</h4>
    <div class="form-group">
    <label for="income">Monthly Income:</label>
    <input type="number" class="form-control" id="income" name="income" min="0" required>
    </div>
    <div class="form-group">
    <label for="employmentStatus">Employment Status:</label>
    <select class="form-control" id="employmentStatus" name="employmentStatus" required>
        <option value="employed">Employed</option>
        <option value="unemployed">Unemployed</option>
        <option value="selfEmployed">Self-Employed</option>
        <option value="student">Student</option>
        <option value="retired">Retired</option>
      </select>
    </div>

    <!-- Reasons for Adoption -->
    <h4>Reasons for Adoption:</h4>
    <div class="form-group">
      <label for="adoptionReason">Why do you want to adopt a pet?</label>
      <textarea class="form-control" id="adoptionReason" name="adoptionReason" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="careExpectations">Your expectations and plans for caring for the pet:</label>
      <textarea class="form-control" id="careExpectations" name="careExpectations" rows="3" required></textarea>
    </div>

    <!-- Agreement to Responsible Pet Ownership -->
    <h4>Agreement to Responsible Pet Ownership:</h4>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="provideProperCare" name="provideProperCare" required>
      <label class="form-check-label" for="provideProperCare">Willingness to provide proper care, including veterinary care, grooming, and training.</label>
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="spayingNeutering" name="spayingNeutering" required>
      <label class="form-check-label" for="spayingNeutering">Commitment to spaying/neutering (if not already done by the shelter).</label>
    </div>

    <!-- Home Visit or Interview -->
    <h4>Home Visit or Interview:</h4>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="homeVisitInterview" name="homeVisitInterview">
      <label class="form-check-label" for="homeVisitInterview">I am open to a home visit or interview.</label>
    </div>

    <!-- Adoption Fee -->
    <h4>Adoption Fee:</h4>
    <div class="form-group">
      <label for="adoptionFee">Adoption Fee:</label>
      <input type="number" class="form-control" id="adoptionFee" name="adoptionFee" min="0">
    </div>

    <!-- Legal Agreements -->
    <h4>Legal Agreements:</h4>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="legalAgreement" name="legalAgreement" required>
      <label class="form-check-label" for="legalAgreement">I agree to the terms outlined in the adoption contract or agreement.</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
