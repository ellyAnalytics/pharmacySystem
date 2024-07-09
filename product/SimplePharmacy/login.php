<?php
$hostname = 'localhost'; // your database hostname
$username = 'root'; // your database username
$password = ''; //  your database password
$database = 'simplepharmacy'; //  your database name
    
$connection = mysqli_connect($hostname, $username, $password, $database);
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
        
// the form fields have names 'Email' and 'Password'
$Email = $_POST['email'];
$Password = $_POST['password'];

// Validate the login credentials against the database
$selectQuery = "SELECT * FROM registration WHERE email = '$Email' AND password = '$Password'";
$result = mysqli_query($connection, $selectQuery);

if (mysqli_num_rows($result) == 1) {
    if ($result) {
        // Registration successful, redirect to login page or display success message
        header('Location: home.php');
        exit();
    } 
    // Login successful, proceed to the authenticated area or display success message
} else {
    // Login failed, handle the error (e.g., display error message)
        header('Location: wrongReg.html');
        exit();
}

?>