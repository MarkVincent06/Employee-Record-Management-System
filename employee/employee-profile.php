<?php
    session_start();

    if(isset($_SESSION['active-user'])) {
        include 'includes/refreshEmployeeSession.php';

        // gets all the data of department from db
        include '../crudDB/getDepartmentData.php';
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
    <link rel="stylesheet" href="css/employee-profile.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- EMPLOYEE PROFILE VALIDATION JS -->
    <script src="js/employee-profile-validation.js"></script>

    <!-- SHOW SUCCESS TOAST MESSAGE JS -->
    <script src="js/showSuccessToastMsg.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Profile | Employee Record Management System</title>
</head>
<body>
    <!-- This session will display a message after the user updates his/her profile -->
    <?php if(isset($_SESSION['successToastMsg'])): ?>
        <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
        <input id="hiddenToastMsg" type="hidden" value="<?php echo $_SESSION['successToastMsg']; unset($_SESSION['successToastMsg']); ?>">
    <?php endif ?>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <header><img class="main-logo" src="../img/main-logo.png" alt="Main logo of the system">ERMS</header>
        <ul>
            <li><a href="employee-dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li class="active"><a href="employee-profile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
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
        <div class="main-wrapper">
            <header>
                <img src="img/default-employee-avatar.png" alt="Main logo of the system">
                <h2>Mark Vincent Cleofe</h2>
            </header>

            <div class="form-wrapper">
                <!-- PERSONAL DETAILS -->
                <h3>Personal Details</h3>

                <!-- This hidden input is the id of the active user and will be used to update the db -->
                <input id="hiddenActiveUserId" type="hidden" value="<?php echo $id ?>">

                <!-- First name -->
                <div class="form-control">
                    <label for="firstname">First name*</label>
                    <input id="firstname" type="text" name="firstname" value="<?php echo $firstname ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Last name -->
                <div class="form-control">
                    <label for="lastname">Last name*</label>
                    <input id="lastname" type="text" name="lastname" value="<?php echo $lastname ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Date of birth -->
                <div class="form-control">
                    <label for="date-of-birth">Date of birth*</label>
                    <input id="date-of-birth" type="date" name="date-of-birth" value="<?php echo $dateOfBirth ?>">
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
                            <option value="" <?php if($gender == "") { echo ' selected="selected"'; } ?> >
                            Select your gender...
                            </option>
                            <option value="Male" <?php if($gender == "Male") { echo ' selected="selected"'; } ?>>
                                Male
                            </option>
                            <option value="Female" <?php if($gender == "Female") { echo ' selected="selected"'; } ?>>
                                Female
                            </option>
                        </select>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-control">
                    <label for="email">Email address*</label>
                    <input id="email" type="text" name="email" value="<?php echo $email ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Phone -->
                <div class="form-control">
                    <label for="phone">Phone number</label>
                    <input id="phone" type="number" name="phone" value="<?php echo $phone ?>" >
                </div>

                <!-- EMPLOYMENT DETAILS -->
                <h3>Employment Details</h3>

                <!-- Employee code -->
                <div class="form-control">
                    <label for="emp-code">Employee code</label>
                    <input id="emp-code" type="text" name="emp-code" value="<?php echo $empCode ?>" disabled>
                </div>

                <!-- Department -->
                <div class="form-control">
                    <label>Department*</label>
                    <div class="select-wrapper">
                        <select id="department">
                            <option value="">Select your department...</option>
                            <?php foreach($departmentData as $department): ?>
                                <option value="<?php echo $department['dept_name'] ?>" >
                                    <?php echo $department['dept_name'] ?>
                                </option>
                            <?php endforeach ?>
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
                    <input id="job-position" type="text" name="job-position" value="<?php echo $jobPosition ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Supervisor -->
                <div class="form-control">
                    <label for="supervisor">Supervisor*</label>
                    <input id="supervisor" type="text" name="supervisor" value="<?php echo $supervisor ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Hire date -->
                <div class="form-control">
                    <label for="hire-date">Hire-date*</label>
                    <input id="hire-date" type="date" name="hire-date" value="<?php echo $hireDate ?>">
                    <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                    </div>
                </div>

                <!-- Salary -->
                <div class="form-control">
                    <label for="salary">Salary</label>
                    <input id="salary" type="number" name="salary" value="<?php echo $salary ?>"> 
                </div>

                <button id="update-btn" class="update-btn" type="button">Update Profile</button>

            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>
</html>