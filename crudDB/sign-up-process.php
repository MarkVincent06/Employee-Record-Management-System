<?php
    session_start();

    $_SESSION['sign-up-msg'] = "Signed up successfully!";

    header('Location: ../employee/employee-dashboard.php');