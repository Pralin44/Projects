<?php include('login2.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Registration system PHP and MySQL
	</title>
	<style> <?php include('style.css')?> </style>
	<style>
        body {
        background: #3f4141;
        }
</style>
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('error.php'); ?>

		<div class="input-group">
			<label>Enter Username</label>
			<input type="text" name="username"
				value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email"
				value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Enter Password</label>
			<input type="text" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn"
								name="reg_user">
				Register
			</button>
		</div>
		


<p>
			Already having an account?
			<a href="login.php">
				Login Here!
			</a>
		</p>



	</form>
</body>
</html>
