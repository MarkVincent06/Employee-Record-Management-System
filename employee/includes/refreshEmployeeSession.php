<?php
    // This will refresh the active user session so it will always be up to date whenever the data in the db changes
    include '../config/database.php';

    $activeUserId = $_SESSION['active-user']['emp_id'];

    $sql = "SELECT * FROM `employee` WHERE emp_id = '$activeUserId'";
    $result = mysqli_query($conn, $sql) or die("No data found!");
    $employeeAccount = mysqli_fetch_assoc($result);
    $_SESSION['active-user'] = $employeeAccount;


    $id = $_SESSION['active-user']['emp_id'];
    $firstname = $_SESSION['active-user']['firstname'];
    $lastname = $_SESSION['active-user']['lastname'];
    $empCode = $_SESSION['active-user']['emp_code'];
    $dateOfBirth = $_SESSION['active-user']['date_of_birth'];
    $gender = $_SESSION['active-user']['gender'];
    $email = $_SESSION['active-user']['email'];
    $phone = $_SESSION['active-user']['phone'];
    $password = $_SESSION['active-user']['password'];
    $department = $_SESSION['active-user']['department'];
    $jobPosition = $_SESSION['active-user']['job_position'];
    $supervisor = $_SESSION['active-user']['supervisor'];
    $hireDate = $_SESSION['active-user']['hire_date'];
    $salary = $_SESSION['active-user']['salary'];

     // Free result set
     mysqli_free_result($result);

     // closing the connection to the db
     mysqli_close($conn);