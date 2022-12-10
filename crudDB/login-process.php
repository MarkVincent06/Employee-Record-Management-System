<?php
    session_start();

    // Include the file that connects to the database
    include '../config/database.php';

    // the message will change depending when the user logs in or signs up
    $popUpMsg = isset($_GET['message']) ? $_GET['message'] : "Logged in successfully!";
    $_SESSION['popUpMsg'] = $popUpMsg;

    // gets the email and password depending when the user logs in or signs up
    if(isset($_POST['login'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
    } else if(isset($_GET['email'])) {
        $email = htmlspecialchars($_GET['email']);
        $password = htmlspecialchars($_GET['password']);
    }

    // this will log in the user's account 
    $sql = "SELECT * FROM `employee` WHERE email = '$email' AND password = '$password';";
    $result = mysqli_query($conn, $sql) or die("No data found!");
    $employeeAccount = mysqli_fetch_assoc($result);
    $_SESSION['active-user'] = $employeeAccount;
       
    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);

    header('Location: ../employee/employee-dashboard.php');