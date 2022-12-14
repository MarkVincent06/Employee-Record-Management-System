<?php
    session_start();

    include '../../config/database.php';

    // GETTING SOME DATA OF EMPLOYEE FROM DB
    $sql = "SELECT emp_code, email FROM employee";
    $result = mysqli_query($conn, $sql);
    $empData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if($empData) {
        echo json_encode($empData);
    }

    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);