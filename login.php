<?php 
require('connection.inc.php')
?><style><?php include 'style.css'?></style>
<html>
    <style>
        body {
        background: #3f4141;
        }
    </style>
<div class="header">
        <h2>Login Here!</h2>
    </div>
      
    <form method="post" action="login2.php">
  
        <?php require('error.php'); ?>
  
        <div class="input-group">
            <label>Enter Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                        name="login_user">
                Login
            </button>
        </div>
         
 
 
<p>
    <b> New Here?
            <a href="register.php">
                Click here to register!
            </a>
    </b>
</p>
<p>
    <b>
            <a href="forgot-password.php">
                Forgot Passworf?
            </a>
    </b>
</p>
</html>