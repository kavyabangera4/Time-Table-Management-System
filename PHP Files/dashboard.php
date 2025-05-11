<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #3498db, #8e44ad);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        h2 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .btn-add {
            background: #27ae60;
        }
        .btn-add:hover {
            background: #219150;
        }
        .btn-logout {
            background: #e74c3c;
        }
        .btn-logout:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>You have successfully logged in.</p>
        <div class="btn-container">
            <a href="insert_schedule.php" class="btn btn-add">Add Teachers</a>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
    </div>
</body>
</html>
