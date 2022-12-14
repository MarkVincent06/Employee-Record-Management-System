<?php
    session_start();
    // Deletes an employee in the databse
    if(isset($_GET['id'])) {
        include '../config/database.php';

        // this will show a success message in the next page
        $_SESSION['successToastMsg'] = "An employee has been deleted successfully!";

        $id = htmlspecialchars($_GET['id']);

        $sql = "DELETE FROM employee WHERE emp_id = '$id'";

        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);

        header('Location: ../admin-employee.php');
    }

    