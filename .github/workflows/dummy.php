<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$db = mysqli_connect('localhost', 'root', '', 'project');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Error fetching user data: " . mysqli_error($db));
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jorbranch - User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="background-blur"></div>
    <div class="navbar">
        <div class="dropdown">
            <a href="#">☰</a>
            <div class="dropdown-content">
                <a href="profile.php">Profile</a>
                <a href="purchases.html">Purchases</a>
                <a href="jorlog.php">Logout</a>
            </div>
        </div>
        <img src="images/logo.jpg" alt="Logo">
        <a href="home.php">Home</a>
        <a href="shop.html#all-products">Shop</a>
        <a href="cart.html">Cart</a>
        <a href="about.html">About Us</a>
    </div>

   <div class="profile-box">
    <div class="profile-header">
        <img src="images/brian.png" alt="Profile Picture" class="profile-pic" id="profilePic">
        <input type="file" accept="image/*" id="fileInput" style="display: none;" onchange="previewImage(event)">
        <label for="fileInput" class="upload-button">Change</label>
    </div>
     <hr class="separator">
   //here
    <div class="vertical-separator"></div>



    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const profilePic = document.getElementById('profilePic');
                    profilePic.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function togglePasswordVisibility() {
            const passwordDisplay = document.getElementById('passwordDisplay');
            const currentText = passwordDisplay.innerText;
            if (currentText === '********') {
                passwordDisplay.innerText = '<?php echo htmlspecialchars($user['password']); ?>';
                document.getElementById('togglePassword').classList.remove('fa-eye');
                document.getElementById('togglePassword').classList.add('fa-eye-slash');
            } else {
                passwordDisplay.innerText = '********';
                document.getElementById('togglePassword').classList.remove('fa-eye-slash');
                document.getElementById('togglePassword').classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>

<style>
.vertical-separator {
    width: 2px;
    background-color: #333;
    height: 310px; /* Adjust this height as needed */
    margin: 2px 0;
	  margin-left: 150px;
	  position: relative;              /* Add positioning for further adjustments if needed */
    top: -13px;   
}
.separator {
     border-top: 1px solid #000;
    margin: 10px 0;
    width: 17%; /* Adjust width to fit the dropdown width */
    margin-left: 1px;
	  position: relative; 
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.background-blur {
    background-image: url('Images/ggg.jpg');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
    position: absolute;
    width: 100%;
    height: 100%;
    filter: blur(2px);
    z-index: -1;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f4e3;
    color: #333;
    overflow: hidden;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.upload-button {
    position: absolute;
    top: 135px; /* Move the button below the profile picture */
    left: 9%; /* Center the button under the picture */
    transform: translateX(-50%); /* Ensure it's centered */
    padding: 5px 10px; /* Small padding */
    background-color: #6d656b;
    color: white;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    font-size: 8px; /* Small font size */
    transition: background-color 0.3s;
}

.upload-button:hover {
    background-color: #4b4d48;
}

.navbar {
    position: fixed;
    top: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #6d656b;
    height: 10vh;
    width: 100%;
    color: white;
    padding: 0 10px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 3;
}

.navbar a {
    text-decoration: none;
    color: white;
    padding: 24px 30px;
    border-radius: 5px;
    font-size: 20px; 
}

.navbar a:hover {
    background-color: #4b4d48;
}

.navbar img {
    height: 62px; 
    width: 200px;
    margin-left: -272px;
    object-fit: fill; 
    border-radius: 100px;
}

.dropdown { 
    position: relative;
    display: inline-block;
    padding: 0 0px;
    z-index: 1;
    width: 19%;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #6d656b;
    color: black; 
    min-width: 150px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 3;
    height: 28vh;
    left: -16px;
    top: 177%; 
    width: 100%;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 20px;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
    width: 67%;
}

.profile-box {
    background-color: rgba(255, 255, 255, 1);
    border-radius: 15px;
    padding: 30px;
    width: 940px;
    height: auto;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.profile-pic {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
}

.profile-details {
    display: flex;
    justify-content: space-between;
    width: 90%;
}

.left-column {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    margin-right: 20px;
}

.right-column {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.left-column p {
    font-size: 25px;
    margin: 25px 0;
}

.right-column p {
    font-size: 25px;
    margin: 20px 0;
}

.right-column {
    margin-top: 10px;
}

input[type="file"] {
    display: none;
}


.logout-button {
    position: absolute;
    top: 65px;
    right: 60px;
    background-color: red;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: darkred;
}
</style>
