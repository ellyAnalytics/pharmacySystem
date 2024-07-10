<?php
include("dbcon.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // SQL query to insert user data
    $sql = "INSERT INTO registration (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";

    // Attempt to execute the query
    if (mysqli_query($con, $sql)) {
        header('Location: index.php');
        exit();
    } else {
        // Check if the email already exists
        if (mysqli_errno($con) == 1062) {
            echo "Error: Email already exists. Please choose a different email.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    // Close the database connection
    mysqli_close($con);
}

?>
<?php
error_reporting(1);
//session_start();
//include("dbcon.php");
//if(isset($_SESSION['user_session'])){
  
  $invoice_number="CA-".invoice_number();
	//header("location:home.php?invoice_number=$invoice_number");
//}

  

  function invoice_number(){   //********Outputting Random Number For Invoice Number********

    $chars = "09302909209300923";

    srand((double)microtime()*1000000);

    $i = 1;

    $pass = '';

    while($i <=7){

      $num  = rand()%10;
      $tmp  = substr($chars, $num,1);
      $pass = $pass.$tmp;
      $i++;
    }
    return $pass;
                        //********Outputting Random Number For Invoice Number********
  }                       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="html2index.css">
    <title>WELCOME TO MADAWA PHARMACY INFO SYSTEM</title>
</head>
<body>
<div class="wrapper">
    <nav class = "nav">
        <div class="nav-menu" id = "navMenu">
            <ul>
                <li> <a href="#" class = "link active">Home</a> </li>
                <li> <a href="#" class = "link">Blog</a> </li>
                <li> <a href="#" class = "link">Services</a> </li>
                <li> <a href="#" class = "link">About</a> </li>
            </ul>
        </div>
        <div class="nav-button">
            <button class = "btn white-btn" id="loginBtn" onclick="login()"> Sign In</button>
            <button class = "btn" id="registerBtn" onclick="register()"> Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class ="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    
    <div class="form-box"> 
    
        <div class="register-container" id = "register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form action="index.php" method = "post">
            <div class="two-forms">
           
                <div class="input-box">
                    <input type="text" name="firstName" class = "input-field" placeholder="Firstname">
                    <i class = "bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="lastName" class = "input-field" placeholder="Lastname">
                    <i class = "bx bx-user"></i>
                </div> 
            </div>
                <div class="input-box">
                    <input type="email" name="email" class = "input-field" placeholder="Email">
                    <i class = "bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class = "input-field" placeholder="Password">
                    <i class = "bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class = "submit" value="submit">
                </div>
               
                <div class="two-col">
                     <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check">Remember Me</label>
                     </div>
                     <div class="two">
                        <label><a href="#">Terms & Conditions</a></label>
                     </div>
                </div>    
                </form>  
        </div>
      
<!--log in-->
        <div class="login-container" id = "login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form action="login.php" method = "post">
                <div class="input-box">
                    <input type="email" name="email" class = "input-field" placeholder="Username or Email">
                    <i class = "bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class = "input-field" placeholder="Password">
                    <i class = "bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class = "submit" value="Login">
                </div>
                
                <div class="two-col">
                     <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check">Remember Me</label>
                     </div>
                     <div class="two">
                        <label><a href="#">|Forgot password?</a></label>
                     </div>
                </div>   
                </form> 
        </div>
      
    </div>
</div>

</script>
<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login(){
         x.style.left = "4px";
         y.style.right = "-520px";
         x.style.opacity = 1;
         y.style.opacity = 0; 
    }
    function register(){
        x.style.left = "-510px";
        y.style.right = "5px";
        x.style.opacity = 0;
        y.style.opacity = 1; 
    }
</script>
</body>
</html>