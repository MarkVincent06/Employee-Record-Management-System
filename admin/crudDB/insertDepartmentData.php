<?php
    session_start();

    include '../config/database.php';
    
    // INSERTS A NEW DEPARTMENT AT THE DB
    if(isset($_POST['insertDeptData'])) {
        // this will show a success message in the next page
        $_SESSION['successToastMsg'] = "A department has been added successfully!";

        $deptName = htmlspecialchars($_POST['deptName']);
        $deptDesc = htmlspecialchars($_POST['deptDesc']);
        $supervisor = htmlspecialchars($_POST['supervisor']);
        $location = htmlspecialchars($_POST['location']);
        
        // inserts new data
        $sql = "INSERT INTO department (dept_name, dept_description, supervisor, location)
        VALUES ('$deptName', '$deptDesc', '$supervisor', '$location')";
        
        // save to db and check
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    } 