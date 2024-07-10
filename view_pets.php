<?php
    session_start();
    // Database configuration
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "pawprint"; 
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if (isset($_SESSION['success'])) : ?>
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
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    }
    ?>
    <?php
    $name='';
    $mem='';
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: login.php');
    }?>
<!DOCTYPE html>
<html>
<head>
    <title>View Pets</title>
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"
    />
  <script src="https://kit.fontawesome.com/2866db5307.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
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
        height: 440px; 
        width:400px;
    }
    main{
        margin-left:15rem;
    }
</style>
    <style>
        /* Black and grey theme */
        body {
            background-color: #222;
            color: #fff;
        }

        /* Card layout */
        .card {
            max-width: 300px;
            background-color: #444;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .card img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 0;
            font-size: 20px;
            color: #fff;
        }

        .card p {
            color: #ccc;
        }
        .r1{
            display: block;
            margin-left: auto;
            margin-right: auto;
            color: white;
            background-color: #3f4141;
        }
        .r1 a {
            color: cyan;
            padding: 10px;
            display: block;
            text-decoration: none;  
            filter: grayscale(100%) opacity(0.7); 
        }
        .r1 a:hover{
            filter: grayscale(0%) opacity(1);
            color: cyan;
        }
        .card a{
            color: #0099cc;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease; /* Smooth transition for color change */
        }

        /* Style for the "View Details" link on hover */
        .card a:hover {
            color: #ff6600; /* Change the color on hover */
            text-decoration: underline;
        }
    </style>
</head>
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
    <h2>All Registered Pets</h2>
    <?php
    $sql = "SELECT * FROM pets WHERE status = 'accepted'";
    $result = $conn->query($sql);  

    // The rest of the PHP code to fetch and display the pet records
    // ...

    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<img src="' . $row["image"] . '" alt="Pet Image">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p>Breed: ' . $row["breed"] . '</p>';
        echo '<p>Description: ' . $row["short_desc"] . '</p>';
        echo '<a href="view_pet_details.php?id=' . $row["id"] . '">Wanna Adopt him/her?</a>';
        echo '</div>';
    }
    ?>
    
    <div class="r1">
                <center><Strong><h2><a href="register_pets.php">Register your pet for adoption???</a></h2></strong><center>
                </div>
</main>
<script src="menu.js"></script>
</body>
</html>
