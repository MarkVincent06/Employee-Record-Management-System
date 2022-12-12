<?php
    session_start();

    // gets all the data of department from db
    include 'crudDB/getDepartmentData.php';

    // gets all the data of employee from db
    include 'crudDB/getEmployeeData.php';

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
    <link rel="stylesheet" href="css/admin-dashboard.css">
    <link rel="stylesheet" href="css/global.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- LOGIN-MESSAGE JS -->
    <script src="../js/login-sign-up-msg.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Dashboard | Employee Record Management System</title>
</head>
<body>
    <!-- This session will display a message after the admin logs in -->
    <?php if(isset($_SESSION['popUpMsg'])): ?>
        <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
        <input id="hidden-input" type="hidden" value="<?php echo $_SESSION['popUpMsg']; unset($_SESSION['popUpMsg']); ?>">
    <?php endif ?>
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <header><img class="main-logo" src="../img/main-logo.png" alt="Main logo of the system">ERMS Admin</header>
        <ul>
            <li class="active"><a href="admin-dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="admin-department.php"><i class="fa-solid fa-building"></i>Department</a></li>
            <li><a href="admin-employee.php"><i class="fa-solid fa-user-tie"></i>Employee</a></li>
        </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main>
        <header>
            <div class="profile-bar">
                <p class="profile-name" onclick="toggleSubMenu()" ><?php echo $_SESSION['admin-active-user'] ?></p>
                <img class="avatar"src="img/admin-avatar.png" alt="An avatar of an admin" onclick="toggleSubMenu()">
        
                <!-- Includes sub menu -->
                <?php include 'includes/admin-sub-menu.php'; ?>
            </div>  
        </header>
        
        <div class="dashboard-content">
            <header class="dashboard-header">
                <h1>Dashboard</h1>
            </header>
            <div class="statistics">
                <div class="department">
                    <h2><?php echo count($departmentData) ?></h2>
                    <i class="fa-solid fa-building"></i>
                    <p>Department/s</p>
                </div>
                <div class="employee">
                    <h2><?php echo count($employeeData) ?></h2>
                    <i class="fa-solid fa-users"></i>
                    <p>Employee/s</p>
                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>
</html>