<?php
    session_start();

    // gets all the data of department from db
    include 'crudDB/getDepartmentData.php';

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
    <link rel="stylesheet" href="css/admin-department.css">
    <link rel="stylesheet" href="css/global.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- SUCCESS-TOAST-MESSAGE JS -->
    <script src="js/showSuccessToastMsg.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Department | Employee Record Management System</title>
</head>
<body>  
    <!-- This session will display a toast message -->
    <?php if(isset($_SESSION['successToastMsg'])): ?>
    <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
    <input id="hiddenToastMsg" type="hidden" value="<?php echo $_SESSION['successToastMsg']; unset($_SESSION['successToastMsg']); ?>">
    <?php endif ?>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <header><img class="main-logo" src="../img/main-logo.png" alt="Main logo of the system">ERMS Admin</header>
        <ul>
            <li><a href="admin-dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li class="active"><a href="admin-department.php"><i class="fa-solid fa-building"></i>Department</a></li>
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
                <h1>Department</h1>
                <div class="add-btn-wrapper">
                    <i class="fa-solid fa-user-plus"></i>
                    <a href="add-edit-department/add-department.php"><button class="add-btn" type="button">Add Department</button></a>
                </div>
            </header>

            <!-- TABLE -->
            <div class="before-table">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>S.NO</th>
                            <th>Department Name</th>
                            <th>Department Description</th>
                            <th>Supervisor</th>
                            <th>Employee Count</th>
                            <th>Location</th>
                            <th>Creation Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($departmentData as $key=>$department): ?>
                            <tr>
                                <td class="table-data-btns">
                                    <a href="add-edit-department/edit-department.php?id=<?php echo $department['dept_id'] ?>">
                                        <button class="edit-btn">Edit</button>
                                    </a> 
                                    <a href="crudDB/deleteDepartmentData.php?id=<?php echo $department['dept_id'] ?>">
                                        <button class="delete-btn">Delete</button>
                                    </a>
                                </td>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $department['dept_name']; ?></td>
                                <td><?php echo $department['dept_description']; ?></td>
                                <td><?php echo $department['supervisor']; ?></td>
                                <td><?php echo $department['emp_count']; ?></td>
                                <td><?php echo $department['location']; ?></td>
                                <td><?php echo $department['created_at']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>
</html>