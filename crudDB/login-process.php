<?php
    session_start();

    $_SESSION['login-msg'] = "Logged in successfully!";

    header('Location: ../employee/employee-dashboard.php');