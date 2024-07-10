<?php
header('Content-Type: text/html; charset=utf-8');
require('connection.inc.php');
require('functions.php');
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
    <link rel="stylesheet" href="style.css">
    <style>
    body{
        background-color:#222;
        color:white;
        text-align:justify;
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

    </style>
    <body>
    <nav class="navbar">
            <ul class="navbar-nav">
                <li class="logo">
                    <a href="index1.php" class="nav-link">
                        <span class="link-text">Paw Print </span>
                        <i class="fa-solid fa-kiwi-bird fa-2xl" style="color: cyan;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index1.php" class="nav-link">
                        <i class="fa-solid fa-house fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Home </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="view_pets.php" class="nav-link">
                        <i class="fa-solid fa-dog fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Registered Pets</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Shelter/shelter.php" class="nav-link">
                        <i class="fa-solid fa-shop fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Shelters</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact_us.php" class="nav-link">
           
                         <i class="fa-sharp fa-solid fa-envelope fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Contact us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="phplol.html" class="nav-link">
           
                         <i class="fa-sharp fa-solid fa-envelope fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">us</span>
                    </a>
                </li>
                
                <div class="sub-menus" id="subMenus">
                        <a href="#">Logged In</a>
                        <a href="logout.php">Logout</a>
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
            <main>

            <!DOCTYPE html>
            <html>
            <head>
                <title>Image Upload Form</title>
                <style>
                    .form-container input[type="file"],
                    .form-container input[type="submit"] {
                        width: 100%;
                        padding: 10px;
                        margin-bottom: 20px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                    }
                
                    .form-container input[type="submit"] {
                        background-color: #4CAF50;
                         margin: 0;
                    }
                
                    .form-container {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                
                    .form-container h1 {
                        margin-bottom: 20px;
                    }
                
                    .form-container label {
                        display: block;
                        margin-bottom: 8px;
                    } color: white;
                        border: none;
                        cursor: pointer;
                    }
                
                    .form-container input[type="submit"]:hover {
                        background-color: #45a049;
                    }
                </style>
            </head>
            <body>
                <div class="form-container">
                    <h1>Upload Image for Prediction</h1>
                    <form method="POST" action="process1.php" enctype="multipart/form-data">
                        <label for="image">Choose an image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                        <input type="submit" value="Upload and Predict">
                    </form>
                </div>
            </body>
            </html>
                

            </main>
        <script src="menu.js"></script>
        <script src="slide.js"></script>
    </body>
</html>
