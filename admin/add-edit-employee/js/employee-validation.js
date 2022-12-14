$(document).ready(() => {

    // ADD EMPLOYEE EVENT
    $(".add-btn").click(() => {
        // removes error in an input
        $(".form-control").removeClass('error')

        // validates all the inputs
        if ( validateFirstName($("#firstname")) & validateLastName($("#lastname")) & validateDateOfBirth($("#date-of-birth")) & checkEmpCode($("#emp-code")) & validateEmail($("#email")) & 
        validatePassword($("#password")) & validateDept($("#department")) & validateJobPos($("#job-position")) &
        validateSupervisor($("#supervisor")) & validateHireData($("#hire-date")) ) {
            $.ajax({
                url: '../crudDB/insertEmployeeData.php',
                method: 'POST',
                data: {
                        insertEmployee: "Inserting employee", 
                        firstname: $("input#firstname").val(), lastname: $("input#lastname").val(),
                        dateOfBirth: $("#date-of-birth").val(), gender: $("#gender").val(),
                        email: $("#email").val(), password: $("#password").val(),
                        phone: $("#phone").val(), empCode: $("#emp-code").val(),
                        department: $("#department").val(), jobPosition: $("#job-position").val(),
                        supervisor: $("#supervisor").val(), hireDate: $("#hire-date").val(),
                        salary: $("#salary").val()
                    },  
                success: response => {
                    // if successful, it will redirect to the updateDepartmentData server and update the values in the db
                    window.location.href = '../admin-employee.php'
                }
            })
        }
    })


    // UPDATE EMPLOYEE EVENT
    $("#update-btn").click(() => {
        // removes error in an input
        $(".form-control").removeClass('error')

        // validates all the inputs
        if ( validateFirstName($("#firstname")) & validateLastName($("#lastname")) & validateDateOfBirth($("#date-of-birth")) & validateEmail($("#email")) & 
        validatePassword($("#password")) & validateDept($("#department")) & validateJobPos($("#job-position")) &
        validateSupervisor($("#supervisor")) & validateHireData($("#hire-date")) ) {
            $.ajax({
                url: '../crudDB/updateEmployeeData.php',
                method: 'POST',
                data: {
                        updateEmployee: "Updating employee", id: $('#hiddenActiveUserId').val(),
                        firstname: $("input#firstname").val(), lastname: $("input#lastname").val(),
                        dateOfBirth: $("#date-of-birth").val(), gender: $("#gender").val(),
                        email: $("#email").val(), password: $("#password").val(),
                        phone: $("#phone").val(), empCode: $("#emp-code").val(),
                        department: $("#department").val(), jobPosition: $("#job-position").val(),
                        supervisor: $("#supervisor").val(), hireDate: $("#hire-date").val(),
                        salary: $("#salary").val()
                    },  
                success: response => {
                    // if successful, it will redirect to the updateDepartmentData server and update the values in the db
                    // window.location.href = '../admin-employee.php'
                }
            })
        }
    })

    // validates first name
    function validateFirstName(firstNameInput) {
        if (firstNameInput.val().length === 0) {
            displayError(firstNameInput, "Please enter your first name")
            return false
        }

        return true
    }

    // validates last name
    function validateLastName(lastNameInput) {
        if (lastNameInput.val().length === 0) {
            displayError(lastNameInput, "Please enter your last name")
            return false
        }

        return true
    }

    // validates birthdate
    function validateDateOfBirth(birthDateInput) {
        if(!/^\d{4}-\d{2}-\d{2}$/.test(birthDateInput.val())) {
            displayError(birthDateInput, "Invalid date format")
            return false
        }
        return true
    }

    // validates email
    function validateEmail(emailInput) {
        const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        const isEmailValid = emailRegex.test(emailInput.val())

        if(emailInput.val() === '') {
           displayError(emailInput, "Please enter your email address")
           return false
        } else {
           if(!isEmailValid) {
              displayError(emailInput, "The email address you entered is not valid")
              return false
           } else {
                let isEmailUnique = true 
                
                 // using ajax to fetch the email and password data from the database
                $.ajax({
                    url: './getEmployeeData.php',
                    method: 'POST',
                    async: false,
                    success: response => {
                    empData = JSON.parse(response)
                    
                    for(let account of empData) {
                        if(account.email === emailInput.val()) {
                                isEmailUnique = false
                                displayError(emailInput, "This email address is already taken")
                                break
                        }
                    }
                    }
                })

                return isEmailUnique ? true : false
           }
        }

        return true
    }

    // validates password
    function validatePassword(passwordInput) {
        if (passwordInput.val().length === 0) {
            displayError(passwordInput, "Please enter your last name")
            return false
        }

        return true
    }

    // Checks employee code
    function checkEmpCode(empCodeInput) {
        const empCodeInputValue = empCodeInput.val()

        if(empCodeInputValue === '') {
            displayError(empCodeInput, "Enter employee code") 
        } else if(empCodeInputValue.length <= 6) {
            displayError(empCodeInput, "This employee code is not valid")   
        } else {
            let isEmpCodeUnique = true 
                
            // using ajax to fetch the email and password data from the database
            $.ajax({
                    url: './getEmployeeData.php',
                    method: 'POST',
                    async: false,
                    success: response => {
                    empData = JSON.parse(response)
                    
                    for(let account of empData) {
                        if(account.emp_code === empCodeInput.val()) {
                                isEmpCodeUnique = false
                                displayError(empCodeInput, "This employee code is already taken")
                                break
                        }
                    }
                    }
            })

            return isEmpCodeUnique ? true : false
        }
        return false
    }

    // validates department
    function validateDept(deptInput) {
        if (deptInput.val().length === 0) {
            displayError(deptInput.parent(), "Please select your department")
            return false
        }

        return true
    }
    
    // validates job position
    function validateJobPos(jobPosInput) {
        if (jobPosInput.val().length === 0) {
            displayError(jobPosInput, "Please enter your job position")
            return false
        }

        return true
    }

    // validates supervisor
    function validateSupervisor(supervisorInput) {
        if (supervisorInput.val().length === 0) {
            displayError(supervisorInput, "Please enter your supervisor")
            return false
        }

        return true
    }
    
    // validates hire date
    function validateHireData(hireDateInput) {
        if(!/^\d{4}-\d{2}-\d{2}$/.test(hireDateInput.val())) {
            displayError(hireDateInput, "Invalid date format")
            return false
        }

        return true
    }


    // displays error 
    function displayError(input, errorMessage) {
        const formControlEl = input.parent()
        
        // this will focus the error input
        $('html, body').scrollTop(input.offset().top - 120);
        input.focus()
           
        formControlEl.addClass('error')
        formControlEl.find('small').text(errorMessage)
    }

})