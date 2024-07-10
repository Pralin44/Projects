<?php
session_start();
unset($_SESSION['username']);
header('location:http://localhost/ProjectPAW/index1.html');
die();
?>