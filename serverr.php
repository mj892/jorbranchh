<?php
session_start();


$username = "";
$email    = "";
$fname    = "";
$lname    = "";
$celnum   = "";
$adr      = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'project');


if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['reg_user'])) {
   
    $fname = isset($_POST['firstname']) ? mysqli_real_escape_string($db, $_POST['firstname']) : '';
    $lname = isset($_POST['lastname']) ? mysqli_real_escape_string($db, $_POST['lastname']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($db, $_POST['username']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : '';
    $celnum = isset($_POST['celnum']) ? mysqli_real_escape_string($db, $_POST['celnum']) : '';
    $adr = isset($_POST['address']) ? mysqli_real_escape_string($db, $_POST['address']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : '';

    
    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' OR celnum='$celnum' OR password='$password' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    
    if (!$result) {
        die("Error in query: " . mysqli_error($db));
    }

    $user = mysqli_fetch_assoc($result);
    if ($user) {
       
        if ($user['username'] === $username) {
            echo "<script>alert('This username is already in use.');</script>";
            return; 
        }
        if ($user['email'] === $email) {
            echo "<script>alert('This email is already in use.');</script>";
            return;
        }
        if ($user['celnum'] === $celnum) {
            echo "<script>alert('This cellphone number is already in use.');</script>";
            return; 
        }
		if ($user['password'] === $password) {
    echo "<script>alert('This password is already in use. Please choose a different password.');</script>";
    return;
}

    } else {
        
       // $password = md5($password); 
        $query = "INSERT INTO user (fname, lname, username, email, celnum, adr, password) 
                  VALUES('$fname', '$lname', '$username', '$email', '$celnum', '$adr', '$password')";

        if (mysqli_query($db, $query)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.html');
            exit();
        } else {
            die("Error inserting data: " . mysqli_error($db));
        }
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

   
    if (count($errors) == 0) {
        // Prepare the query to fetch user data by username
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

       
        if (mysqli_num_rows($results) == 1) {
            // Password is correct
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('Location: home.html');
            exit();
        } else {
          
            array_push($errors, "Wrong username/password combination");
            echo "<script>alert('Wrong username/password combination');</script>";
        }
    }
}

?>
