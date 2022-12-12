<?php  
    session_start();
    
    include '../config/database.php';
    
    // UPDATES ALL THE DATA OF EMPLOYEE IN THE DB EXCLUDING THE PASSWORD
    if(isset($_POST['updateProfile'])) {
        // this will show a success message in the next reload of the browser
        $_SESSION['successToastMsg'] = "Your profile has been successfully updated!";

        $id = htmlspecialchars($_POST['id']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
        $gender = htmlspecialchars($_POST['gender']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $department = htmlspecialchars($_POST['department']);
        $jobPosition = htmlspecialchars($_POST['jobPosition']);
        $supervisor = htmlspecialchars($_POST['supervisor']);
        $hireDate = htmlspecialchars($_POST['hireDate']);
        $salary = htmlspecialchars($_POST['salary']);
        
        // updates employee data
        $sql = "UPDATE employee 
        SET firstname = '$firstname', lastname = '$lastname', date_of_birth = '$dateOfBirth', gender = '$gender',
        email = '$email', phone = '$phone', department = '$department', job_position = '$jobPosition',
        supervisor = '$supervisor', hire_date = '$hireDate', salary = '$salary' 
        WHERE emp_id = '$id'";
        
        if(!mysqli_query($conn, $sql)) {
            die("Query error: " . mysqli_error($conn));
        } else {
            // this will update the department data after updating the employee data

            // selecting first the no. of employee/s 
            $sql = "SELECT employee.* FROM employee INNER JOIN department ON employee.department = department.dept_name
            AND employee.supervisor = department.supervisor;";
            $result = mysqli_query($conn, $sql);
            $noOfEmpRows = mysqli_num_rows($result);
          
            if($noOfEmpRows > 0) {
                // this will update the emp count of dept table       
                $sql = "UPDATE department SET emp_count = $noOfEmpRows WHERE dept_name = \'$department\' AND supervisor = \'$supervisor\';";
            }

            // Free result set
            mysqli_free_result($result);

            // closing the connection to the db
            mysqli_close($conn);
        }

        
    } 