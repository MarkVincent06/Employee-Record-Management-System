<?php
    session_start();

    include '../config/database.php';
    
    // INSERTS A NEW DEPARTMENT AT THE DB
    if(isset($_POST['updateDeptData'])) {
        // this will show a success message in the next page
        $_SESSION['successToastMsg'] = "A department has been updated successfully!";

        $id = htmlspecialchars($_POST['id']);
        $deptName = htmlspecialchars($_POST['deptName']);
        $deptDesc = htmlspecialchars($_POST['deptDesc']);
        $supervisor = htmlspecialchars($_POST['supervisor']);
        $location = htmlspecialchars($_POST['location']);
        
        // updates employee data
        $sql = "UPDATE department 
        SET dept_name = '$deptName', dept_description = '$deptDesc', supervisor = '$supervisor',
        location = '$location' WHERE dept_id = '$id'";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);
    } 