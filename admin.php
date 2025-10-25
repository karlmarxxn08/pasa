<?php
include("includes/auth_session.php");
include("includes/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {font-family: Arial; background: #f7f7f7; margin: 0; padding: 20px;}
        .container {background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: 50px auto; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        .btn {display: inline-block; margin: 10px 5px; padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;}
        .btn.logout {background: #dc3545;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>You are logged in as <strong><?php echo $_SESSION['role']; ?></strong>.</p>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>
</body>
</html>
