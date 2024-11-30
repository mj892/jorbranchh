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

if (isset($_POST['update_user'])) {
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $celnum = mysqli_real_escape_string($db, $_POST['celnum']);
    $adr = mysqli_real_escape_string($db, $_POST['adr']);
    $new_username = mysqli_real_escape_string($db, $_POST['username']);
    $new_password = mysqli_real_escape_string($db, $_POST['password']); 
    
 
    $update_query = "UPDATE user SET fname='$fname', lname='$lname', email='$email', celnum='$celnum', adr='$adr', username='$new_username', password='$new_password' WHERE username='$username'";

    if (mysqli_query($db, $update_query)) {
        $_SESSION['username'] = $new_username;
        $_SESSION['success'] = "Your information has been updated!";
        header('Location: profile.php');
        exit();
    } else {
        die("Error updating record: " . mysqli_error($db));
    }
}

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
                <a href="profile.php">Account Settings</a>
                <a href="purchases.html">Purchases</a>
                <a href="#" onclick="confirmLogout()">Logout</a>
            </div>
        </div>
        <img src="images/logo.jpg" alt="Logo">
        <a href="home.html">Home</a>
        <a href="shop.html#all-products">Shop</a>
        <a href="cart.html">Cart</a>
        <a href="about.html">About Us</a>
    </div>

    <div class="profile-box">
        <div class="profile-header">
            <img src="images/prf1.jpg" alt="Profile Picture" class="profile-pic" id="profilePic">
            <input type="file" accept="image/*" id="fileInput" style="display: none;" onchange="previewImage(event)">
            <hr class="separator">
            <a href="#" class="logout-button" onclick="confirmLogout()">Logout</a>
        </div>

        <form method="POST" action="profile.php">
            <div class="profile-details">
                <div class="left-column">
                    <p><strong>Firstname:</strong> 
                        <span id="fname" onclick="editField('fname')"><?php echo htmlspecialchars($user['fname']); ?></span>
                        <input type="text" name="fname" id="fnameInput" value="<?php echo htmlspecialchars($user['fname']); ?>" class="edit-input" style="display: none;" required>
                    </p>

                    <p><strong>Lastname:</strong> 
                        <span id="lname" onclick="editField('lname')"><?php echo htmlspecialchars($user['lname']); ?></span>
                        <input type="text" name="lname" id="lnameInput" value="<?php echo htmlspecialchars($user['lname']); ?>" class="edit-input" style="display: none;" required>
                    </p>

                    <p><strong>Username:</strong> 
                        <span id="username" onclick="editField('username')"><?php echo htmlspecialchars($user['username']); ?></span>
                        <input type="text" name="username" id="usernameInput" value="<?php echo htmlspecialchars($user['username']); ?>" class="edit-input" style="display: none;" required>
                    </p>
                </div>

                <div class="right-column">
                    <p><strong>Password:</strong> 
                        <span id="passwordDisplay">********</span>
                        <i id="togglePassword" class="fas fa-eye" style="cursor: pointer;" onclick="togglePasswordVisibility()"></i>
                    </p>
                    <input type="password" name="password" id="passwordInput" class="edit-input" style="display: none;" placeholder="Enter new password">

                    <p><strong>Email:</strong> 
                        <span id="email" onclick="editField('email')"><?php echo htmlspecialchars($user['email']); ?></span>
                        <input type="email" name="email" id="emailInput" value="<?php echo htmlspecialchars($user['email']); ?>" class="edit-input" style="display: none;" required>
                    </p>

                    <p><strong>Cell No.:</strong> 
                        <span id="cellnum" onclick="editField('cellnum')"><?php echo htmlspecialchars($user['celnum']); ?></span>
                        <input type="text" name="celnum" id="cellnumInput" value="<?php echo htmlspecialchars($user['celnum']); ?>" class="edit-input" style="display: none;" required>
                    </p>

                    <p><strong>Address:</strong> 
                        <span id="address" onclick="editField('address')"><?php echo htmlspecialchars($user['adr']); ?></span>
                        <input type="text" name="adr" id="addressInput" value="<?php echo htmlspecialchars($user['adr']); ?>" class="edit-input" style="display: none;" required>
                    </p>
                </div>
            </div>

            <button type="submit" name="update_user" class="update-info-button update-info-button-top">Update Info</button>
        </form>

        <a href="#" class="delete-account-button position-bottom" onclick="confirmDeleteAccount()">Delete Account</a>
    </div>

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
            const passwordInput = document.getElementById('passwordInput');
            const currentText = passwordDisplay.innerText;
            if (currentText === '********') {
                passwordDisplay.innerText = '<?php echo htmlspecialchars($user['password']); ?>';
                document.getElementById('togglePassword').classList.remove('fa-eye');
                document.getElementById('togglePassword').classList.add('fa-eye-slash');
                passwordInput.style.display = 'inline-block';
            } else {
                passwordDisplay.innerText = '********';
                document.getElementById('togglePassword').classList.remove('fa-eye-slash');
                document.getElementById('togglePassword').classList.add('fa-eye');
                passwordInput.style.display = 'none';
            }
        }

        function confirmLogout() {
            const confirmed = confirm("Are you sure you want to log out?");
            if (confirmed) {
                window.location.href = "jorlog.php"; 
            }
        }

        function confirmDeleteAccount() {
            const confirmed = confirm("Are you sure you want to delete your account? This action cannot be undone.");
            if (confirmed) {
                window.location.href = "delete_account.php";
            }
        }

        function editField(field) {
            const span = document.getElementById(field);
            const input = document.getElementById(field + 'Input');
            span.style.display = 'none';
            input.style.display = 'inline-block';
            input.focus();
            input.select();

            input.onblur = function() {
                span.innerText = input.value;
                span.style.display = 'inline-block';
                input.style.display = 'none';
            };
        }
    </script>
</body>
</html>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.background-blur {
   background-color:rgba(112, 128, 144, 0.9);
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

.update-info-button {
    position: absolute;
    right: 40px;
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

.update-info-button:hover {
    background-color: #45a049;
}

.update-info-button-top {
    top: 480px;  
    right: 40px;
}


.delete-account-button {
    position: absolute;
    right: 770px;
    background-color: red;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

.delete-account-button:hover {
    background-color: darkred;
}

.position-bottom {
    bottom: 20px;
}

.position-top {
    bottom: 70px;
}

a {
    text-decoration: none;
}

.update-info-button, .delete-account-button {
    text-decoration: none;
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
    top: 132px;
    left: 9%;
    transform: translateX(-50%);
    padding: 5px 10px;
    background-color: #6d656b;
    color: white;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    font-size: 8px;
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
    background-color: rgba(219, 205, 205, 2);
    border-radius: 15px;
    padding: 30px;
    width: 940px;
    height: 540px;
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

.separator {
    border: none;
    border-top: 3px solid #2c5f2d;
    margin: 9px 0;
    width: 880%;
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

.edit-input {
    display: inline-block;
    font-size: 25px;
    padding: 5px;
    margin-top: 10px;
    width: 100%;
    box-sizing: border-box;
}

</style>