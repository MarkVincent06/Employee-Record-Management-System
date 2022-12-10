<?php
    // GETTING ALL THE EMAIL AND PASSWORD OF EMPLOYEE FROM DB
    include '../config/database.php';

    $sql = "SELECT email, password FROM employee";
    $result = mysqli_query($conn, $sql);
    $emailAndPassData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if($emailAndPassData) {
        echo json_encode($emailAndPassData);
    }

    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);
