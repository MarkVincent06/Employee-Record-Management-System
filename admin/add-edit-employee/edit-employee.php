<?php
    session_start();

    include '../../config/database.php';

    // GETTING THE DEPARTMENT NAME DATA OF DEPARTMENT FROM DB
    $sql = "SELECT dept_name FROM department ORDER BY created_at";
    $result = mysqli_query($conn, $sql);
    $departmentNameData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_GET['id'])) {
        $employee;
    
        $id = htmlspecialchars($_GET['id']);
        
        // GETTING A SPECIFIC EMPLOYEE FROM DB
        $sql = "SELECT * FROM employee WHERE emp_id = '$id'";

        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        } else {
            $result = mysqli_query($conn, $sql);
            $employee = mysqli_fetch_assoc($result);
        }
    }

    // Free result set
    mysqli_free_result($result);

    // closing the connection to the db
    mysqli_close($conn);

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
    <link rel="stylesheet" href="css/edit-employee.css">
    <link rel="stylesheet" href="../css/global.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- DEPARTMENT VALIDATION JS -->
    <script src="js/employee-validation.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Edit Employee | Employee Record Management System</title>
</head>
<body>
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <header><img class="main-logo" src="img/main-logo.png" alt="Main logo of the system">ERMS Admin</header>
        <ul>
            <li><a href="../admin-dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="../admin-department.php"><i class="fa-solid fa-building"></i>Department</a></li>
            <li class="active" ><a href="../admin-employee.php"><i class="fa-solid fa-user-tie"></i>Employee</a></li>
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
                <h1>Edit Employee</h1>
                <div class="back-btn-wrapper">
                    <i class="fa-solid fa-arrow-left"></i>
                    <a href="../admin-employee.php"><button class="back-btn">Go Back</button></a>
                </div>
            </header>


            <div class="form-outer-wrapper">

                <div class="form-inner-wrapper">

                    <!-- This hidden input is the id of the active user and will be used to update the db -->
                    <input id="hiddenActiveUserId" type="hidden" value="<?php echo $employee['emp_id'] ?>">

                    <!-- First name -->
                    <div class="form-control">
                        <label for="firstname">First name*</label>
                        <input id="firstname" type="text" name="firstname" value="<?php echo $employee['firstname'] ?>">
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>

                    <!-- Last name -->
                    <div class="form-control">
                        <label for="lastname">Last name*</label>
                        <input id="lastname" type="text" name="lastname" value="<?php echo $employee['lastname'] ?>">
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>

                    <!-- Date of birth -->
                    <div class="form-control">
                        <label for="date-of-birth">Date of birth*</label>
                        <input id="date-of-birth" type="date" name="date-of-birth" value="<?php echo $employee['date_of_birth'] ?>">
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="form-control">
                        <label for="gender">Gender</label>
                        <div class="select-wrapper">
                            <select id="gender">
                                <option value="" <?php if($employee['gender'] == "") { echo ' selected="selected"'; } ?> >
                                Select a gender...
                                </option>
                                <option value="Male" <?php if($employee['gender'] == "Male") { echo ' selected="selected"'; } ?>>
                                    Male
                                </option>
                                <option value="Female" <?php if($employee['gender'] == "Female") { echo ' selected="selected"'; } ?>>
                                    Female
                                </option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-control">
                        <label for="email">Email address*</label>
                        <input id="email" type="text" name="email" value="<?php echo $employee['email'] ?>">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                        </div>
                    </div>

                     <!-- Password -->
                     <div class="form-control">
                        <label for="password">Password*</label>
                        <input id="password" type="password" name="password" value="<?php echo $employee['password'] ?>">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-control">
                        <label for="phone">Phone number</label>
                        <input id="phone" type="number" name="phone" value="<?php echo $employee['phone'] ?>">
                    </div>
                </div>


                <div class="form-inner-wrapper">
                    <!-- Employee code -->
                    <div class="form-control">
                        <label for="emp-code">Employee code</label>
                        <input id="emp-code" type="text" name="emp-code" value="<?php echo $employee['emp_code'] ?>" disabled>
                    </div>

                    <!-- Department -->
                    <div class="form-control">
                        <label>Department*</label>
                        <div class="select-wrapper">
                            <select id="department">
                                <?php if($departmentNameData > 0): ?>
                                    <option value="" <?php if($employee['department'] == "") { echo ' selected="selected"'; } ?> >Select your department...</option>
                                    <?php foreach($departmentNameData as $item): ?>
                                        <option value="<?php echo $item['dept_name'] ?>" <?php if($employee['department'] === $item['dept_name']) { echo ' selected="selected"'; } ?>  >
                                            <?php echo $item['dept_name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <option value="" <?php if($employee['department'] == "") { echo ' selected="selected"'; } ?> >Select your department...</option>
                                <?php endif ?>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>


                    <!-- Job position -->
                    <div class="form-control">
                        <label for="job-position">Job position*</label>
                        <input id="job-position" type="text" name="job-position" value="<?php echo $employee['job_position'] ?>">
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>

                    <!-- Supervisor -->
                    <div class="form-control">
                        <label for="supervisor">Supervisor*</label>
                        <input id="supervisor" type="text" name="supervisor" value="<?php echo $employee['supervisor'] ?>">
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>

                    <!-- Hire date -->
                    <div class="form-control">
                        <label for="hire-date">Hire-date*</label>
                        <input id="hire-date" type="date" name="hire-date" value="<?php echo $employee['hire_date'] ?>">
                        <div class="validation">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <small></small>
                        </div>
                    </div>

                    <!-- Salary -->
                    <div class="form-control">
                        <label for="salary">Salary</label>
                        <input id="salary" type="number" name="salary" value="<?php echo $employee['salary'] ?>"> 
                    </div>

                    
                    <button id="update-btn" type="submit" class="edit-btn">Update Employee</button>
                </div>

            </div>
    
        </div>
    </main>

  

</body>
</html>