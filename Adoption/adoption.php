<?php

$server="localhost";
$username="root";
$password="";
$dbname="shelter";


$conn=mysqli_connect($server, $username,$password,$dbname);
//for to check the connection of data base

/*
if(!$conn){
 echo("db did not connect");    
 die();

}
else{
    echo("DBconnected");
}
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Page Title</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <style>
        /* Add your custom styles here */
        .product {
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            height:100%;
        }

        /* Ensure all products have the same height */
        .product-container {
            display: flex;
            flex-wrap: wrap;
        }

        .product-col {
            flex: 1;
            margin: 10px; /* Adjust margin as needed */
        }
    </style>
</head>
<body>

<div class="container-fluid" style="background-color: blue; padding: 20px;">
    <div class="row" >
        <?php
        $query = "SELECT * FROM adopt_info ORDER BY RAND() LIMIT 3";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-4 product-trigger" data-toggle="modal" data-target="#exampleModalLong"  data-name="<?php echo $row["name"]; ?>"  data-age="<?php echo $row["age"]; ?>" data-info="<?php echo $row["info"]; ?>" data-c_info="<?php echo $row["c_info"]; ?>" data-health="<?php echo $row["health"]; ?>">
                    <div class="product">
                        <form method="post" action="adoption_form.php">
                            <img src="<?php echo $row["img"]; ?>" class="img-fluid" alt="Product Image">
                            <h5 class="text-info">Name: <?php echo $row["name"]; ?></h5>
                            <h5 class="text-info">Shelter Location: <?php echo $row["c_info"]; ?></h5>
                            <button type="button" class="btn btn-primary btn-more-info" data-toggle="modal" data-target="#exampleModalLong">
                            More info
                            </button>
                            <input type="hidden" name="i_id" value="<?php echo $row["adopt_id"]; ?>">
                            <input type="submit" name="add" class="btn btn-success" value="Adopt Now">
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<!--modal body-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLongTitle" style = "padding-left:25%;">More Information</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br />
          <div class="container">
            <h5 class="text-info" id="modal-name"></h5>
            <h5 class="text-info" id="modal-age"></h5>
            <h5 class="text-info" id="modal-health"></h5>
            <h5 class="text-info" id="modal-c_info"></h5>
            <h5 class="text-info" >Description</h5>
            <span id="modal-info"></span>

            <!-- Add more fields as needed -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<!--end modal body-->



<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
<script>
    $(document).ready(function () {
        // Handle click on product-trigger class
        $('.product-trigger,.btn-more-info').on('click', function () {
            // Get the data attributes from the clicked element
            var info = $(this).data('info');
            var name = $(this).data('name');
            var age = $(this).data('age');
            var c_info = $(this).data('c_info');
            var health = $(this).data('health');
            // Add more variables as needed

            // Set the modal body content with the clicked element's data
            $('#modal-name').text('Name: ' + name);
            $('#modal-age').text('Age: ' + age);
            $('#modal-health').text('Health: ' + health);
            $('#modal-c_info').text('Contact: ' + c_info);
            $('#modal-info').text( info);
            // Update more elements as needed
        });
    });
</script>

