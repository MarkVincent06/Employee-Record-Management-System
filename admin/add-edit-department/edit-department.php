<?php
    session_start();

    $department;

    if(isset($_GET['id'])) {
        include '../config/database.php';

        $id = htmlspecialchars($_GET['id']);

        $sql = "SELECT * FROM department WHERE dept_id = '$id'";
  
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        } else {
            $result = mysqli_query($conn, $sql);
            $department = mysqli_fetch_assoc($result);
        }

        // Free result set
        mysqli_free_result($result);

        // closing the connection to the db
        mysqli_close($conn);
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
    <link rel="stylesheet" href="css/edit-department.css">
    <link rel="stylesheet" href="../css/global.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- DEPARTMENT VALIDATION JS -->
    <script src="js/department-validation.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Edit Department | Employee Record Management System</title>
</head>
<body>
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <header><img class="main-logo" src="img/main-logo.png" alt="Main logo of the system">ERMS Admin</header>
        <ul>
            <li><a href="../admin-dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li class="active"><a href="../admin-department.php"><i class="fa-solid fa-building"></i>Department</a></li>
            <li><a href="../admin-employee.php"><i class="fa-solid fa-user-tie"></i>Employee</a></li>
        </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main>
        <header>
            <div class="profile-bar">
                <p class="profile-name" onclick="toggleSubMenu()" ><?php echo $_SESSION['admin-active-user'] ?></p>
                <img class="avatar"src="img/admin-avatar.png" alt="An avatar of an admin" onclick="toggleSubMenu()">
        
                <!-- Includes sub menu -->
                <?php include '../includes/admin-sub-menu.php'; ?>
            </div>  
        </header>
        
        <div class="dashboard-content">
            <header class="dashboard-header">
                <h1>Add Department</h1>
                <div class="back-btn-wrapper">
                    <i class="fa-solid fa-arrow-left"></i>
                    <a href="../admin-department.php"><button class="back-btn">Go Back</button></a>
                </div>
            </header>

            <div class="form-wrapper">

                <!-- This hidden input is the id of the department and will be used to update the db -->
                <input id="hiddenIdInput" type="hidden" value="<?php echo $department['dept_id'] ?>">

                <!-- Department name -->
                <div class="form-control">
                    <label for="dept-name">Department name</label>
                    <input id="dept-name" type="text" name="dept-name" value="<?php echo $department['dept_name'] ?>" disabled>
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Department description -->
                <div class="form-control">
                    <label for="dept-desc">Department description*</label>
                    <textarea name="dept-desc" id="dept-desc" cols="30" rows="4" placeholder="Short description about the department..." maxlength="200"><?php echo $department['dept_description'] ?></textarea>
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Supervisor -->
                <div class="form-control">
                    <label for="supervisor">Supervisor*</label>
                    <input id="supervisor" type="text" name="supervisor" value="<?php echo $department['supervisor'] ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Location -->
                <div class="form-control">
                    <label for="location">Location*</label>
                    <input id="location" type="text" name="location" value="<?php echo $department['location'] ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>
                
                <button type="submit" class="update-btn">Update Department</button>
            </div>
    
        </div>
    </main>

</body>
</html>