<?php

$server="localhost";
$username="root";
$password="";
$dbname="pawprint";


$conn=mysqli_connect($server, $username,$password,$dbname);
//for to check the connection of data base


/*if(!$conn){
 echo("db did not connect");    
 die();

}
else{
    echo("DBconnected");
}*/

?>
<?php
require('../connection.inc.php');
require('../functions.php');
$name='';
$mem='';
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}
  
?>

<?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        
<?php if (isset($_SESSION['username'])){
        $username=$_SESSION['username']; 
  
    }?>

<!DOCTYPE hmtl>
<html>
    <head><title>Paw Print Academy</title></head>
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/2866db5307.js" crossorigin="anonymous"></script>
    
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Page Title</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
      <style>
body{
    background-color:#222;
}
.sub-menus {
        display: none;
        position: absolute;
        top:80%;
        right: 2rem;
        left:2rem;
        background-color: #f2f2f2;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .sub-menus a {
        color: black;
        padding: 10px;
        display: block;
        text-decoration: none;
    }

    .sub-menus a:hover {
        background-color: #ddd;
    }

/* styles.css */
.product {
    border: 1px solid #ccc;
    padding: 0px;
    margin-bottom: 0px;
    width:100%;
    height: 100%;
  
}

.product img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.product h5 {
    margin: 0;
    padding: 5px 0;
}

.text-info {
    color: blue;
}

.text-danger {
    color: red;
}

.text-success {
    color: green;
}

.container-fluid {
    background-color: grey;
    width: 75%;
    padding: 5px;
    right: 2in;
    padding: 20px; 
    margin-left:16rem; 
}
form, .content {
	width: 100%;
    height:100%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}

    </style>
</head>
<body>
<nav class="navbar">
            <ul class="navbar-nav">
                <li class="logo">
                    <a href="../index1.php" class="nav-link">
                        <span class="link-text">Paw Print </span>
                        <i class="fa-solid fa-kiwi-bird fa-2xl" style="color: cyan;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../index1.php" class="nav-link">
                        <i class="fa-solid fa-house fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Home </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../view_pets.php" class="nav-link">
                        <i class="fa-solid fa-dog fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Registered Pets</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="shelter.php" class="nav-link">
                        <i class="fa-solid fa-shop fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Shelters</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../contact_us.php" class="nav-link">
           
                         <i class="fa-sharp fa-solid fa-envelope fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Contact us</span>
                    </a>
                </li>
                
                <div class="sub-menus" id="subMenus">
                        <a href="#">Logged In</a>
                        <a href="../logout.php">Logout</a>
                    </div> 
                <li class="nav-item" onclick="toggleSubMenus()" style="cursor: pointer;">
                    <div class="nav-link">
                        <i class="fa-solid fa-gear fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">User <?php echo $_SESSION['username']; ?></span>
                    </div>           
                </li>>
            </ul>
        </nav>

    <?php  if (isset($_SESSION['username'])) : ?>
    <h1 style="text-align:center;">Welcome  <?php echo $_SESSION['username']; ?></h1>
    <?php endif ?>

    <div class="container-fluid">
    <div class="row">
        <?php
        $query = "SELECT * FROM shelter_info ORDER BY shelter_id ASC ";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
            	$capacity = $row["capacity"];
                $occupied = $row["occupied"];
                $available = $capacity - $occupied;
                ?>
                <div class="col-md-4">
                    <div class="product">
                        <form method="post" action="book.php">
                            <img src="<?php echo $row["img"]; ?>" class="img-fluid" alt="Product Image">
                            <h5 class="text-info">Name: <?php echo $row["name"]; ?></h5>
                            <h5 class="text-info">Address: <?php echo $row["address"]; ?></h5>
                            <h5 class="text-danger">Info: <?php echo $row["info"]; ?></h5>
                            <h5 class="text-danger">Price: Rs <?php echo $row["price"]; ?> per day</h5>
                             <h5>Status: <span class="<?php echo ($available > 0) ? 'text-success' : 'text-danger'; ?>">
                                <?php echo ($available > 0) ? 'Available (' . $available . ')' : 'Unavailable'; ?>
                            </span></h5>
                            <input type="text" name="days" class="form-control" value="" placeholder="Number of days" required>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="i_id" value="<?php echo $row["shelter_id"]; ?>">
                            <input type="submit" name="add" class="btn btn-success" value="Book Now">
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
    <div class="r1">
        <center><Strong><h2><a href="../Adoption/adoption_form.php">Want to adopt a pet?</a></h2></strong><center>
    </div>

<!-- Add Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../menu.js"></script>
</body>
</html>
