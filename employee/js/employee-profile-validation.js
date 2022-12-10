$(document).ready(() => {
    $("#update-btn").click(() => {
        // removes error in an input
        $(".form-control").removeClass('error')

        // validates all the inputs
        if ( validateFirstName($("#firstname")) & validateLastName($("#lastname")) & validateDateOfBirth($("#date-of-birth")) &
        validateEmail($("#email")) & validateDept($("#department")) & validateJobPos($("#job-position")) &
        validateSupervisor($("#supervisor")) & validateHireData($("#hire-date")) ) {
            // perform ajax later
            console.log("SUCCESS")
        }
        
        // validates first name
        function validateFirstName(firstNameInput) {
            if (firstNameInput.val().length === 0) {
                displayError(firstNameInput, "Please enter your first name")
                return false
            }
        
            if (/[^a-zA-Z]/.test(firstNameInput.val())) {
            // if the name contains non-letter characters, show an error message
                displayError(firstNameInput, "Please enter a valid name (only letters are allowed)")
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
        
            if (/[^a-zA-Z]/.test(lastNameInput.val())) {
            // if the name contains non-letter characters, show an error message
                displayError(lastNameInput, "Please enter a valid name (only letters are allowed)")
                return false
            }
    
            return true
        }

        // validates birthdate
        function validateDateOfBirth(birthDateInput) {
            if(!/^\d{4}-\d{2}-\d{2}$/.test(birthDateInput.val())) {
                displayError(birthDateInput, "Invalid date format. Please enter a date in the format mm-dd-yyyy")
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
                  displayError(emailInput, "The email address you entered is not valid. Please enter a valid email address.")
                  return false
               } else {
                  return true // will add condition to check for existing email later
               }
            }
   
            return true
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
                displayError(hireDateInput, "Invalid date format. Please enter a date in the format mm-dd-yyyy")
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
})