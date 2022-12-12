<?php
    
    include '../config/database.php';

    // getting all the data of department from db
    $sql = "SELECT * FROM department";
    $result = mysqli_query($conn, $sql);
    $departmentData = mysqli_fetch_all($result, MYSQLI_ASSOC);

   
    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);