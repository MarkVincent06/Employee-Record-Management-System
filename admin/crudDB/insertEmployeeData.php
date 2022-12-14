<?php
    session_start();

    include '../config/database.php';
    
    // INSERTS A NEW DEPARTMENT AT THE DB
    if(isset($_POST['insertEmployee'])) {
        // this will show a success message in the next page
        $_SESSION['successToastMsg'] = "An employee has been updated successfully!";

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
        $gender = htmlspecialchars($_POST['gender']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $phone = htmlspecialchars($_POST['phone']);
        $empCode = htmlspecialchars($_POST['empCode']);
        $department = htmlspecialchars($_POST['department']);
        $jobPosition = htmlspecialchars($_POST['jobPosition']);
        $supervisor = htmlspecialchars($_POST['supervisor']);
        $hireDate = htmlspecialchars($_POST['hireDate']);
        $salary = htmlspecialchars($_POST['salary']);
        
        // inserts employee from db
        $sql = "INSERT INTO employee (firstname, lastname, emp_code, date_of_birth, gender, email, password, phone, department, job_position, supervisor, hire_date, salary)
        VALUES ('$firstname', '$lastname', '$empCode', '$dateOfBirth', '$gender', '$email', '$password', '$phone',  '$department', '$jobPosition', '$supervisor', '$hireDate', '$salary')";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    } 