<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
</head>
<style><?php include 'style.css'?></style>
<body>

    <h1>Forgot Password</h1>

    <form method="post" action="send-password-reset.php">

        <label for="email">email</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" value="Submit">

    </form>

</body>
<script src="check.js"></script>
</html>