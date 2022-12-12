<?php
    session_start();
    
    if(isset($_SESSION['active-user'])) {
        include 'includes/refreshEmployeeSession.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- DEFAULT META TAGS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS LINKS -->
    <link rel="stylesheet" href="css/employee-dashboard.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- LOGIN-SIGNUP-MESSAGE JS -->
    <script src="../js/login-sign-up-msg.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Dashboard | Employee Record Management System</title>
</head>
<body>
    <!-- This session will display a message after the user logs in or signs up -->
    <?php if(isset($_SESSION['popUpMsg'])): ?>
        <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
        <input id="hidden-input" type="hidden" value="<?php echo $_SESSION['popUpMsg']; unset($_SESSION['popUpMsg']); ?>">
    <?php endif ?>
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <header><img class="main-logo" src="../img/main-logo.png" alt="Main logo of the system">ERMS</header>
        <ul>
            <li class="active"><a href="employee-dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="employee-profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
        </ul>
    </aside>

    <!-- PROFILE BAR -->
    <div class="profile-bar">
        <p class="profile-name" onclick="toggleSubMenu()" ><?php echo $firstname . " " . $lastname?></p>
        <img class="avatar"src="img/default-employee-avatar.png" alt="An avatar of an employee" onclick="toggleSubMenu()">

        <!-- Includes sub menu -->
        <?php include 'includes/profile-sub-menu.php'; ?>
    </div>  

    <!-- MAIN CONTENT -->
    <main>
        <div class="greetings-wrapper">
            <img src="img/welcome-illustration.png" alt="Three people welcoming a girl">
            <p>Welcome, <span><?php echo $firstname . " " . $lastname?>👋</span></p>
        </div>
    </main>

    <footer>

    </footer>

</body>
</html>