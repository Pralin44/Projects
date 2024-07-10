<?php
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
    body {
            background-image: url('Images/background.avif'); /* Replace with the path to your image */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* Prevent repeating the image */
            background-attachment: fixed; /* Fixed background */
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
        <main>
        <div class="b1">
            <table id="contacted">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Mobile No.</th>
                    <th>Email</th>   
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pralin Rogu</td>
                    <td>9841987654</td>
                    <td>pralinrogu@gmail.com</td>   
                </tr>
                <tr>
                    <td>2</td>
                    <td>Drishya Rai</td> 
                    <td>9712345678</td>
                    <td>drishyarai@gmail.com</td>                   
                </tr>
                <tr>
                    <td>3</td>
                    <td>Neha Karki</td>
                    <td>9801238972</td>
                    <td>nehakarki@gmail.com</td>     
                </tr>
                <tr>
                    <td>4</td>
                    <td>Pramesh Kunwar</td>
                    <td>9818487868</td>
                    <td>prameshkunwar@gmail.com</td>
                </tr>
            </table>
            </div>
        </main>
        <script src="menu.js"></script>
    </body>
</html>
