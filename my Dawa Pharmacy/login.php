<?php

include("dbcon.php");
        
// the form fields have names 'Email' and 'Password'
$Email = $_POST['email'];
$Password = $_POST['password'];

// Validate the login credentials against the database
$selectQuery = "SELECT * FROM registration WHERE email = '$Email'";
$result = mysqli_query($con, $selectQuery);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $storedHashedPassword = $row['password'];

    // Verify the entered password against the stored hashed password
    if (password_verify($Password, $storedHashedPassword)) {
        // Login successful, proceed to the authenticated area or display success message
        header('Location: home.php');
        exit();
    } else {
        // Login failed, handle the error (e.g., display error message)
        header('Location: wrongLogin.html');
        exit();
    }
} else {
    // Login failed, handle the error (e.g., display error message)
    header('Location: wrongEmail.html');
}