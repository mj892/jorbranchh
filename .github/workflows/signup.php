

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
            background-image: url('Images/pk.png'); 
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center;
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            z-index: -1; 
        }

        .box {
            border-radius: 90px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            width: 27%;
            text-align: center;
            color: #fff;
            height: 82%;
        }

        .box input {
            border: none;
            border-bottom: 2px solid white;
            background: transparent;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
        }

        .button1 {
            background: linear-gradient(to right,  rgb(169,169,169),  rgb(169,169,169),  rgb(169,169,169));
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 45%; 
            margin-left: 24%;
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
            justify-content: space-between;
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
            width: 45%;
            margin-right: 2%;
            text-decoration: none;
        }

        .button2:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="background-blur"></div>
    <div class="box">
        <form action="register.php" method="POST" onsubmit="return validateForm()">
            <h1>REGISTER YOUR ACCOUNT</h1>
            <input type="text" name="firstname" placeholder="👤 Enter your Firstname here" required> <br><br>
            <input type="text" name="lastname" placeholder="👤 Enter your Lastname here" required> <br><br>
            <input type="text" name="username" placeholder="👤 Enter your Username here" required> <br><br>
            <input type="password" name="password" placeholder="🔒 Enter your password here" required> <br> <br>
            <input type="email" name="email" placeholder="📧 Enter your E-mail here" required> <br> <br>
            <input type="text" name="celnum" placeholder="👤 Enter your Cellphone No. here" required> <br><br>
            <input type="text" name="address" placeholder="🏠 Enter your Address here" required> <br> <br>

            <div class="okay">
              <button type="submit" class="buttomargin-top: 100px;n1">Sign up</button>
            </div>
        </form> <br><br>
    </div>

    <script>
    function validateForm() {
        const firstname = document.forms[0]["firstname"].value;
        const lastname = document.forms[0]["lastname"].value;
        const username = document.forms[0]["username"].value;
        const celnum = document.forms[0]["celnum"].value;
        const address = document.forms[0]["address"].value;

        const namePattern = /^[A-Za-z\s]+$/; // Only letters and spaces
        const usernamePattern = /^[A-Za-z]{10,}$/; // Must be at least 10 letters, no special characters or spaces
        const cellphonePattern = /^09\d{9}$/; // Must start with '09' and have exactly 11 digits
        const addressPattern = /^(?=.*\d)[A-Za-z0-9\s]+$/; // Must contain at least one digit, allows letters and numbers only

        // Validate username
        if (!usernamePattern.test(username)) {
            alert("Invalid username");
            return false;
        }

        // Validate cellphone number
        if (!cellphonePattern.test(celnum)) {
            alert("Cellphone number must start with '09' and contain exactly 11 digits.");
            return false;
        }

        // Other field validations can remain the same
        if (firstname.length < 5) {
            alert("Firstname must contain at least 5 characters.");
            return false;
        }
        if (!namePattern.test(firstname)) {
            alert("Firstname can only contain letters.");
            return false;
        }

        if (lastname.length < 5) {
            alert("Lastname must contain at least 5 characters.");
            return false;
        }
        if (!namePattern.test(lastname)) {
            alert("Lastname can only contain letters.");
            return false;
        }

        if (address.length < 5) {
            alert("Address must contain at least 5 characters.");
            return false;
        }
        if (!addressPattern.test(address)) {
            alert("Address must contain at least one number and can only include letters, numbers, and spaces (no special symbols).");
            return false;
        }

        return true; // Form is valid
    }
    </script>
</body>
</html>

<?php
      session_start();
   
   include("db.php");
   
   if($_SERVER['REQUEST_METHOD'] == "POST')
   {  
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $celnum = $_POST['celnum'];
      $address = $_POST['address'];

    if(!empty($email) && !empty(&password) && !is_numeric($email))
       {
	     &query = "insert into form (firstname, lastname, username, password, email, celnum, address) values ('$firstname', '$lastname', '$username', '$password', '$gender', '$email', '$celnum', '$address')";
         
		mysqli_query($con, &query); 
         echo "<script type='text/javascript'> alert('Successfully Register')</script>";
	   } 
	   else
	   {
          echo "<script type='text/javascript'> alert('Enter Valid Information')</script>";	   
	   
	   }
    }
?>
