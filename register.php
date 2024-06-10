<?php
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <style>

/* .error-message {
  display: block;
  color: #ffffff;
  background-color: #ff0000;
  font-size: 14px;
  padding: 8px;
  margin-top: 10px;
  border-radius: 4px;
} */
/* Form container */
form {
  max-width: 400px;
  margin: 0 auto;
}

body{
    background: url('register1.jpg');
height: 800px;
}

/* Form labels */
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #555;
}

/* Form inputs */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-bottom: 2px solid #ccc;
  background-color: #f5f5f5;
  margin-bottom: 15px;
  transition: border-bottom-color 0.3s ease-in-out;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom-color: #4caf50;
}

/* Error messages */
.error-message {
  display: block;
  color: #ff5a5a;
  font-size: 14px;
  margin-bottom: 10px;
  opacity: 1;
  transition: opacity 0.3s ease-in-out;
}


/* Submit button */
button[type="submit"] {
  background-color: #4caf50;
  color: white;
  padding: 12px 24px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

/* Login page link */
a {
  display: block;
  margin-top: 15px;
  color: #333;
  text-align: center;
  text-decoration: none;
  transition: color 0.3s ease-in-out;
}

a:hover {
  color: #4caf50;
}


    </style>
</head>

<body>

<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3  style="color: white; ">Register Now</h3>

        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="register.php" name="form1" method="post">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>FirstName</label>
                                <input type="text" name="firstname" class="form-control">
                                <span class="error-message" id="firstErr"></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>LastName</label>
                                <input type="text" name="lastname" class="form-control">
                                <span class="error-message" id="lastErr"></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                                <span class="error-message" id="usernameErr" ></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <span class="error-message" id="passErr"></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                                <span class="error-message" id="emailErr"></span>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Contact</label>
                                <input type="text" name="contact" class="form-control">
                                <span class="error-message" id="contactErr"></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button><br>
                            <a href="index.php">Go To Login Page</a>
                        </div>
                        <div id="error-container"></div>
                        <div class="alert alert-success" id="success" style="margin-top: 10px; display: none">
                            <strong>Success!</strong> Account Registration successfully.
                        </div>

                        <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                            <strong>Already Exist!</strong> This Username is Already Exist
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
if(isset($_POST['submit1']))
{
    // Assuming the username value is submitted via a form
    

    // Validate the username field
    if (empty($_POST['username'])) {
        $usernameErr = 'Please enter a username.';
    } 
    else
    {
        $username = trim($_POST['username']);
        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username))
        {
            $usernameErr = 'Username must be between 3 and 20 characters and can only contain letters, numbers, and underscores.';
        }
    }

    // Check if first name is not empty and last name is not empty
    if(empty($_POST['firstname'])) {
        $firstErr = 'First name is required.';
    } else {
        $first_name = trim($_POST['firstname']);
        // Check if first name contains only letters and whitespace
        if(!preg_match('/^[a-zA-Z\s]+$/', $first_name)) {
            $firstErr = 'First name should contain only letters and whitespace.';
            // echo "<script> alert('First name should contain only letters and whitespace.')</script>";
        }
    }

    // Check if last name is not empty
    if(empty($_POST['lastname'])) {
        $lastErr = 'Last name is required.';
    } else {
        $last_name = trim($_POST['lastname']);
        // Check if last name contains only letters and whitespace
        if(!preg_match('/^[a-zA-Z\s]+$/', $last_name)) {
            $lastErr = 'Last name should contain only letters and whitespace.';
            // echo "<script> alert('Last name should contain only letters and whitespace.')</script>";
        }
    }

    // Check if email is not empty and is a valid email address
    if(empty($_POST['email'])) {
        $emailErr = 'Email is required.';
        echo "Email is required";
    } else {
        $email = trim($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Email is not valid.';
            // echo "<script> alert('Email is not valid.')</script>";
        }
    }

    // Check if password is not empty and is at least 8 characters long
    if(empty($_POST['password'])) {
        $passErr = 'Password is required.';
        // echo "<script> alert('Password is required.')</script>";
    } else {
        $password= trim($_POST['password']);
        // if(strlen($password) < 8) {
        //     $error_messages[] = 'Password should be at least 8 characters long.';
        // }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
            $passErr = 'Password should contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character (@$!%*?&), and be at least 8 characters long.';
            // echo "<scrpit> alert('Password should contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character (@$!%*?&), and be at least 8 characters long.')</scrpit>";
        }        
    }

    // Assuming the contact value is submitted via a form
    $contact = $_POST['contact'];

    // Validate the contact field
    if (empty($contact)) {
        $contactErr = 'Please enter your contact information.';
    } elseif (!preg_match('/^(0|91)?[6-9][0-9]{9}$/', $contact)) {
        $contactErr = 'Please enter a valid 10-digit contact number.';
    }


    if(empty($passErr) && empty($emailErr) && empty($lastErr) && empty($firstErr) && empty($contactErr)) {

        
        $sql = "INSERT INTO `registration`(`username`, `first_name`, `last_name`, `email`, `password`, `contact`) VALUES ('$username','$first_name','$last_name','$email','$password','$contact')";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count>0)
        {   
            $response = array(
                'status' => 'success'
            );
            echo json_encode($response);
            echo"<script> alert('Registration Successful')</script>";
            echo"<script> window.location.href='index.php'</script>";
        }
    } else { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var usernameErrElement = document.getElementById('usernameErr');
            <?php if(isset($usernameErr)) { ?>
                usernameErrElement.innerHTML = '<?php echo $usernameErr; ?>';
            <?php } else { ?>
                usernameErrElement.style.display = 'none';
            <?php } ?>

            var firstErrElement = document.getElementById('firstErr');
            <?php if(isset($firstErr)) { ?>
                firstErrElement.innerHTML = '<?php echo $firstErr; ?>';
            <?php } else { ?>
                firstErrElement.style.display = 'none';
            <?php } ?>
            
            var lastErrElement = document.getElementById('lastErr');
            <?php if(isset($lastErr)) { ?>
                lastErrElement.innerHTML = '<?php echo $lastErr; ?>';
            <?php } else { ?>
                lastErrElement.style.display = 'none';
            <?php } ?>

            var emailErrElement = document.getElementById('emailErr');
            <?php if(isset($emailErr)) { ?>
                emailErrElement.innerHTML = '<?php echo $emailErr; ?>';
            <?php } else { ?>
                emailErrElement.style.display = 'none';
            <?php } ?>

            var passErrElement = document.getElementById('passErr');
            <?php if(isset($passErr)) { ?>
                passErrElement.innerHTML = '<?php echo $passErr; ?>';
            <?php } else { ?>
                passErrElement.style.display = 'none';
            <?php } ?>

            var contactErrElement = document.getElementById('contactErr');
            <?php if(isset($contactErr)) { ?>
                contactErrElement.innerHTML = '<?php echo $contactErr; ?>';
            <?php } else { ?>
                contactErrElement.style.display = 'none';
            <?php } ?>


        });

    </script>  
<?php   

    }
}
// if (isset($_POST["submit1"])) {

//     $count = 0;
//     $res = mysqli_query($link, "select * from registration where username='$_POST[username]'") or die(mysqli_error($link));
//     $count = mysqli_num_rows($res);

//     if ($count > 0) {
//         ?>
         <script type="text/javascript">
//             document.getElementById("success").style.display = "none";
//             document.getElementById("failure").style.display = "block";
//         </script>
        <?php
//     } else {

//         mysqli_query($link,"insert into registration(firstname,lastname,username,password,email,contact) values('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]')")or die(mysqli_error($link));
//         ?>
/         <script type="text/javascript">
//             document.getElementById("success").style.display = "block";
//             document.getElementById("failure").style.display = "none";
//         </script>
         <?php
//     }

// }

?>


<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery-price-slider.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>

</html>