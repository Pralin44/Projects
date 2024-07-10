<?php
require('connection.inc.php');
require('functions.php');
$username = "";
$errors = array();
$email = "";
$_SESSION['success'] = "";
if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
  
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
  
    if (count($errors) == 0) {
         
        $password = ($password_1);
         
        $query = "INSERT INTO users (username, email, password)
                  VALUES('$username', '$email', '$password')";
         
        mysqli_query($con, $query);
  
        $_SESSION['username'] = $username;
         
        $_SESSION['success'] = "You have logged in";
         
        header('location: index1.html');
    }
}
  

if (isset($_POST['login_user'])) {
        $username=get_safe_value($con,$_POST['username']);//mysqli_real_escape_string get_safe_value ko satto mause hunxa if not used funcions.inc.php
        $password=get_safe_value($con,$_POST['password']);
        $sql="select * from users where username='$username' and password='$password'";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        $row=mysqli_fetch_array($res);
        if($count>0){
          $_SESSION['username']=$username;
          $_SESSION['success'] = "You have logged in";
            if($row['user_type']=="user"){
            header('location:index1.php');
            die();
            }
            else{
            header('location:Admin/admin_index.php');
            }
        }else{
          $msg="Please Enter correct login details";
          echo $msg;
        }
	}


?>