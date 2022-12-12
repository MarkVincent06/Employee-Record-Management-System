<?php
    session_start();
    // Deletes a department in the databse
    if(isset($_GET['id'])) {
        include '../config/database.php';

        // this will show a success message in the next page
        $_SESSION['successToastMsg'] = "A department has been deleted successfully!";

        $id = htmlspecialchars($_GET['id']);

        $sql = "DELETE FROM department WHERE dept_id = '$id'";

        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        }

        // closing the connection to the db
        mysqli_close($conn);

        header('Location: ../admin-department.php');
    }

    