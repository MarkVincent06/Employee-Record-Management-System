<?php
    // GETTING ALL THE DATA OF EMPLOYEE FROM DB
    include '../config/database.php';

    $sql = "SELECT * FROM employee ORDER BY created_at";
    $result = mysqli_query($conn, $sql);
    $employeeData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);