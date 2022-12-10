<?php
  
    // signs up the user and inserting inputted data in the database
    if(isset($_POST['sign-up'])) {
        // Include the file that connects to the database
        include '../config/database.php';

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $empCode = htmlspecialchars($_POST['emp-code']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Writing a sql query for inserting values in the database
        $sql = "INSERT INTO employee (firstname, lastname, emp_code, email, password)
        VALUES ('$firstname', '$lastname', '$empCode', '$email', '$password')";

        // save to db and check
        if(mysqli_query($conn, $sql)) {
            // shows a message that the user successfully signed up
            $popUpMsg = "Signed up successfully!";

            // This will automatically go to the log in process to log in that newly created account
            header("Location: login-process.php?message=$popUpMsg&email=$email&password=$password");
        } else {
            die("Query error: " . mysqli_error($conn));
        }
    }
