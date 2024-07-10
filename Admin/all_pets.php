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
    header('location: ../login.php');
}
  
?>


<!DOCTYPE html>
<html>
<head>
    <title>All Registered Pets</title>
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
        /* Black and grey theme */
        main {
            background-color: #222;
            color: #fff;
        }

        /* Basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #444;
        }

        th {
            background-color: #444;
        }

        /* Style for the image in the table */
        td img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
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
        <main style="margin-left:15rem !important;padding:2px !important;">
            <h1>Hello Admin!!</h1>
            <h2>All Registered Pets</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Breed</th>
            <th>Description</th>
            <th>Status</th>
        </tr> 
        <?php
        // Retrieve all pets from the database
        $sql = "SELECT * FROM pets";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td><img src='".$row["image"]."' alt='Pet Image'></td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["breed"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["status"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No pets registered yet</td></tr>";
        }

        $conn->close();
        ?>
    </table> 
        <script src="../menu.js"></script>
</main>
    </body>
</html>


    
        
</body>
</html>
