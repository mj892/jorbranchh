<?php include('serverr.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; 
            overflow: hidden; 
        }

        .background-blur {
            background-image: url('Images/pk.png'); /* Point to your image */
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1; 
        }

        .box {
            border-radius: 50px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(9px);
            padding: 30px;
            width: 20%;
            text-align: center;
            color: #fff;
            height: auto;
        }

        .box input {
            border: none;
            border-bottom: 2px solid white;
            background: transparent;
            margin-bottom: 20px;
            padding: 10px;
            width: 80%;
            font-size: 16px;
            outline: none;
        }

        .button1 {
            background: linear-gradient(to right, rgb(169,169,169), rgb(169,169,169), rgb(169,169,169));
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Make button full width */
            margin: 10px 0; /* Add margin for spacing */
        }

        .box h1 {
            letter-spacing: 2px;
            font-size: 30px;
        }

        .box input::placeholder {
            color: white;
        }

        .okay {
            display: flex;
            justify-content: center; /* Center the contents */
            align-items: center;
            width: 100%; 
        }

        .button2 {
            background: none;    
            border: none;       
            color: white;       
            padding: 0;         
            font-size: 16px;     
            cursor: pointer;     
            margin-left: 10px; /* Add some space between buttons */
            text-decoration: none;
        }

        .button2:hover {
            text-decoration: underline; 
        }

        /* Center the "Don't have an account?" text */
        .box1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="background-blur"></div>
    <div class="box">
        <form action="" method="POST" onsubmit="return validateForm();">
            <?php include('error.php'); ?>
            <h1>WELCOME BACK!</h1>
            <input type="text" name="username" placeholder="👤 Enter your username here" required> <br><br>
            <input type="password" name="password" placeholder="🔒 Enter your password here" required> <br> <br>
            
            <div class="okay">
                <button type="submit" class="button1" name="login_user">Login</button>
               
            </div>
        </form> <br><br>
        <hr><br>
        <div class="box1">
            <p>Don't have an account? <a href="jorsign.php">Click here</a></p>
        </div>
    </div>

    <script>
        function validateForm() {
            const username = document.forms[0]["username"].value; 
            const password = document.forms[0]["password"].value;

            const namePattern = /^[A-Za-z\s]+$/; 

            
            if (!namePattern.test(username)) {
                alert("Username can only contain letters and spaces.");
                return false;
            }

           
            return true; 
        }
    </script>
</body>
</html>
