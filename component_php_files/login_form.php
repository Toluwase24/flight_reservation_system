<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT Login_id, Login_username, Login_password FROM login_details WHERE Login_username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $password_verfication);
                    
                    if(mysqli_stmt_fetch($stmt)){

                        if(strcmp($password, $password_verfication) == 0){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            echo "You have successfully logged in!";
                            
                        } else{
                            // Password is not valid, display a generic error message
                            echo "Invalid username or password.";
                            echo '<html>
                                    <head>
                                    <meta http-equiv="refresh" content="2;url=../HTML_Files/login.html" />
                                    </head>
                                    <body>';
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    echo "Invalid username or password.";
                    echo '<html>
                                    <head>
                                    <meta http-equiv="refresh" content="2;url=../HTML_Files/login.html" />
                                    </head>
                                    <body>';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                echo '<html>
                                    <head>
                                    <meta http-equiv="refresh" content="2;url=../HTML_Files/login.html" />
                                    </head>
                                    <body>';
            }

            // Close statement
            mysqli_stmt_close($stmt);
            
        }
    }
    
    // Close connection
    mysqli_close($conn);
}

echo '<html>
        <head>
        <meta http-equiv="refresh" content="2;url=../HTML_Files/main.html" />
        </head>
        <body>';

?>