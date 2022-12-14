<?php
    session_start();

    include '../config/database.php';
    
    // UPDATES AN EMPLOYEE AT THE DB
    if(isset($_POST['updateEmployee'])) {
        // this will show a success message in the next page
        $_SESSION['successToastMsg'] = "An employee has been updated successfully!";

        $id = htmlspecialchars($_POST['id']);
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
        
        // updates employee data
        $sql = "UPDATE employee 
        SET firstname = '$firstname', lastname = '$lastname', emp_code = '$empCode',
        date_of_birth = '$dateOfBirth', gender = '$gender', email = '$email', password = '$password',
        phone = '$phone', department = '$department', job_position = '$jobPosition',
        supervisor = '$supervisor', hire_date = '$hireDate', salary = '$salary'
        WHERE emp_id = '$id'";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    } 