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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Links with Pictures</title>
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/2866db5307.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
        }
        .link-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f0f0f0;
            margin-left:16rem;
            margin-right:3in;
            margin-top:150px;
        }
        .link {
            text-decoration: none;
            color: #333;
            text-align: center;
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .link:hover {
            background-color: #ddd;
        }
        .link img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
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
</head>
<body>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="logo">
                    <a href="admin_index.php" class="nav-link">
                        <span class="link-text">Paw Print </span>
                        <i class="fa-solid fa-kiwi-bird fa-2xl" style="color: cyan;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_index.php" class="nav-link">
                        <i class="fa-solid fa-house fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Home </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="registered_pets.php" class="nav-link">
                        <i class="fa-solid fa-dog fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Registered Pets</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="all_pets.php" class="nav-link">
                        <i class="fa-solid fa-dog fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Pets</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="shelter.php" class="nav-link">
                        <i class="fa-solid fa-shop fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Shelters</span>
                    </a>
                </li>
                
                <div class="sub-menus" id="subMenus">
                        <a href="#">Logged In</a>
                        <a href="../logout.php">Logout</a>
                    </div> 
                <li class="nav-item" onclick="toggleSubMenus()" style="cursor: pointer;">
                    <div class="nav-link">
                        <i class="fa-solid fa-gear fa-2xl" style="color: cyan;"></i>
                        <span class="link-text">Admin</span>
                    </div>
                       
                </li>>
            </ul>
        </nav>

        <main>
        
            <h1 style="color:white;">Hello Admin!!</h1>
    <div class="link-container">
        <a href="add_shelter.php" class="link">
            <img src="../Images/dog1.jpg" alt="Link 1">
            <h2>Add Shelter</h2>
        </a>
        <a href="remove_shelter.php" class="link">
            <img src="../Images/dog1.jpg" alt="Link 2">
            <h2>Remove Shelter</h2>
        </a>
        <a href="edit_shelters.php" class="link">
            <img src="../Images/dog1.jpg" alt="Link 3">
            <h2>Edit Shelter</h2>
        </a>
    </div>
    <script src="../menu.js"></script>
</body>
</html>
