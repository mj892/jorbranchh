<?php 
include('serverr.php'); // Include your server-side logic

$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$celnum = $_POST['celnum'] ?? '';
$address = $_POST['address'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            background-image: url('Images/pk3.png'); 
            background-attachment: fixed;
            background-size: cover;
        }

        .background-blur {
            background-image: url('Images/pk.png');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
            position: absolute;
            width: 100%;
            height: 100%;
            filter: blur(8px);
            z-index: -1; 
        }

        .container {
            width: 400px;
            padding: 20px;
            border-radius: 15px; 
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(2px); 
            background-color: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.5);
            z-index: 1; 
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .profile-info strong {
            display: inline-block;
            width: 120px;
        }

        .profile-info span {
            color: #555;
        }

        .button1 {
            background: linear-gradient(to right, rgb(169,169,169), rgb(169,169,169), rgb(169,169,169));
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; 
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="background-blur"></div>
    <div class="container">
        <h2>Profile Information</h2>
        <div class="profile-info">
            <strong>Firstname:</strong> <span><?php echo htmlspecialchars($firstname); ?></span>
        </div>
        <div class="profile-info">
            <strong>Lastname:</strong> <span><?php echo htmlspecialchars($lastname); ?></span>
        </div>
        <div class="profile-info">
            <strong>Username:</strong> <span><?php echo htmlspecialchars($username); ?></span>
        </div>
        <div class="profile-info">
            <strong>Password:</strong> <span>******</span> <!-- Don't display the actual password -->
        </div>
        <div class="profile-info">
            <strong>Email:</strong> <span><?php echo htmlspecialchars($email); ?></span>
        </div>
        <div class="profile-info">
            <strong>Cellphone No:</strong> <span><?php echo htmlspecialchars($celnum); ?></span>
        </div>
        <div class="profile-info">
            <strong>Address:</strong> <span><?php echo htmlspecialchars($address); ?></span>
        </div>
        <form action="home.html" method="POST">
            <button type="submit" class="button1">Submit</button>
        </form>
    </div>

    <script>
        // Add any required JavaScript here
    </script>
</body>
</html>
