<?php
    session_start();

    $_SESSION['popUpMsg'] = "Logged in successfully!";
    $_SESSION['admin-active-user'] = 'Admin';

    header('Location: ../admin/admin-dashboard.php');