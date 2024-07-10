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
    <link rel="stylesheet" href="../style.css">
    <style>
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
    img {
        height: 500px; 
        width:400px;
    }

</style>
    <body style="background-color: rgb(250, 250, 251);">
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
        
            <h1>Hello Admin!!</h1>
            <div class="container">
                <div class="card">
                    <img src="../Images/dog1.jpg" alt="German shepherd">
                    <div class="intro">
                        <h4><b>Shekhar</b></h4> 
                        <p>Shekhar is a German Shepherd breed. She is 
                            available for adoption.
                        </p>
                    </div> 
                </div>
                <div class="card">
                    <img src="../Images/dog2.webp" alt="Siberian-Husky">
                    <div class="intro">
                        <h4><b>Michelle</b></h4> 
                        <p>michelle is a Siberian-Husky breed. She is not
                            available for adoption.
                        </p>
                    </div> 
                </div>
                <div class="card">
                    <img src="../Images/dog3.jpg" alt="Golden retriever">
                    <div class="intro">
                        <h4><b>Sven</b></h4> 
                        <p>Sven is a Golden Retriever breed. He is not
                            available for adoption.
                        </p>
                    </div> 
                </div>
                <div class="card">
                    <img src="../Images/dog4.jpg" alt="labradoodle">
                    <div class="intro">
                        <h4><b>Sam</b></h4> 
                        <p>Sam is a labradoodle breed. She is not
                            available for adoption.
                        </p>
                    </div> 
                </div> 
        </main>
        <script src="../menu.js"></script>
    </body>
</html>
