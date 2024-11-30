<?php
$text = $_GET['text'] ?? '';
$lastname = $_GET['lastname'] ?? '';
$password = $_GET['password'] ?? '';
$gender = $_GET['gender'] ?? '';
$email = $_GET['email'] ?? '';
$address = $_GET['address'] ?? '';
$date = $_GET['gender'] ?? '';


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
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
		
		  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, rgba(58, 22, 132, 0.9), rgba(227, 60, 60, 0.8), rgba(240, 165, 20, 0.7));
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
 
      
    </style>
</head>
<body>

<div class="container">
  
    <h2>Profile Information</h2>
    <div class="profile-info">
        <strong>Firstname:</strong> <span><?php echo htmlspecialchars($text); ?></span>
    </div>
	 <div class="profile-info">
        <strong>Lastname:</strong> <span><?php echo htmlspecialchars($lastname); ?></span>
    </div>
    <div class="profile-info">
        <strong>Password:</strong> <span><?php echo htmlspecialchars($password); ?></span>
    </div>
	 <div class="profile-info">
        <strong>Gender:</strong> <span><?php echo htmlspecialchars($gender); ?></span>
    </div>
    <div class="profile-info">
        <strong>Email:</strong> <span><?php echo htmlspecialchars($email); ?></span>
    </div>
    <div class="profile-info">
        <strong>Address:</strong> <span><?php echo htmlspecialchars($address); ?></span>
    </div>
	<div class ="okay">
	    <button type = "submit" class = "button1">Submit</button>
		</div>
</div>

</body>
</html>
