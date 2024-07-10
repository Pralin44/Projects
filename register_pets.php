<!DOCTYPE html>
<html>
<head>
    <title>Register Pet</title>
    <?php include 'style.php'?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
    <div class="header_h2">
        <h2>Register a New Pet</h2>
    </div>
    <form id="registerForm" class="form" enctype="multipart/form-data">
       <!-- Existing fields -->
        <div class="form-control">
            <label for="name">Pet Name:</label>
            <input type="text" name="name"  required> <br><br>
        </div>    
        <div class="form-control">
        <label for="breed">Breed:</label>
        <input type="text" name="breed" required><br><br>
        </div>
        <div class="form-control">
        <label for="description">Description:</label>
        <textarea name="description" rows="4" cols="55"  required></textarea><br><br>
        </div>
        <!-- New fields for contact info, short description, and address -->
        <div class="form-control">
        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" required><br><br>
        </div>
        <div class="form-control">
        <label for="short_desc">Short Description:</label>
        <textarea name="short_desc" rows="4" cols="50"  required></textarea><br><br>
        </div>
        <div class="form-control">
        <label for="address">Address:</label>
        <input type="text" name="address" required><br><br>
        </div>
        <div class="form-control">
        <label for="image">Pet Image:</label>
        <input type="file" name="image" accept="image/*" required><br><br>
        </div>
        <button type="submit" value="Register" class="btn">Register</button>
    </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#registerForm").submit(function(event) {
                event.preventDefault();

                // Serialize the form data
                var formData = new FormData($(this)[0]);

                // Send an AJAX request to register_pets.php
                $.ajax({
                    type: "POST",
                    url: "register_pet.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Display the response
                        alert(response);
                    },
                    error: function() {
                        alert("Error submitting the form.");
                    }
                });
            });
        });
    </script>
</html>
