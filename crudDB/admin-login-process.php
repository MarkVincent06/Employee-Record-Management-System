<?php
    session_start();

    $_SESSION['popUpMsg'] = "Logged in successfully!";
    $_SESSION['active-user'] = 'Admin';

    header('Location: ../admin/admin-dashboard.php');