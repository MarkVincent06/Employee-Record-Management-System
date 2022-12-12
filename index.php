<?php
    session_start();

    // redirects to a log in or dashboard depending on the active session of the user
    if(isset($_SESSION['active-user'])) {
        header('Location: employee/employee-dashboard.php');
    } elseif(isset($_SESSION['admin-active-user'])) {
        header('Location: admin/admin-dashboard.php');
    } else {
        header('Location: login.php');
    }