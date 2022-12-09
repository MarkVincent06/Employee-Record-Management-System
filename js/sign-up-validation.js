$(document).ready(() => {
   $("#sign-up-btn").click(e => {
      // removes error validation
      if($(".error").length > 0) {
         $('input').removeClass('error')
         $('.validation').removeClass('error')
      }
      
      // hides password tip
      $('.password-tip').hide()

      // submits the form if all the validations return true
      if( checkFirstNameAndLastName($("#firstname-input"), $("#lastname-input"))
      & checkEmpCode($("#emp-code-input")) & checkEmail($("#email-input"))
      & checkPassword($("#password-input"), $("#repeat-password-input")) ) {
         // redirects to the `login-signup-process server`
      } else {
         e.preventDefault()
      }

      // Checks first name and last name
      function checkFirstNameAndLastName(firstNameInput, lastNameInput) {
         const firstNameInputValue = firstNameInput.val()
         const lastNameInputValue = lastNameInput.val()

         if(firstNameInputValue === '' || lastNameInputValue == '') {
            if(firstNameInputValue === '' && lastNameInputValue === '') {
               displayError2(firstNameInput, lastNameInput, "Enter first and last names")
            } else if(firstNameInputValue === "") {
               displayError(firstNameInput, "Enter first name") 
            } else if(lastNameInputValue === "") {
               displayError(lastNameInput, "Enter last name")
            } 
         } else if( (firstNameInputValue.length + lastNameInputValue.length) <=2) {
            displayError2(firstNameInput, lastNameInput, "First or last names must contain at least 3 characters")
         } else {
            return true
         }
         return false
      }

      // Checks employee code
      function checkEmpCode(empCodeInput) {
         const empCodeInputValue = empCodeInput.val()

         if(empCodeInputValue === '') {
            displayError(empCodeInput, "Enter employee code") 
         } else if(empCodeInputValue.length <= 8) {
            displayError(empCodeInput, "This employee code is not valid")   
         } else {
            return true 
         }
         return false
      }

      // Checks email
      function checkEmail(emailInput) {
         const emailInputValue = emailInput.val()
         const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

         const isEmailValid = emailRegex.test(emailInputValue)

         if(emailInputValue === '') {
            displayError(emailInput, "Enter an email address")
         } else {
            if(!isEmailValid) {
               displayError(emailInput, "Email address is not valid")
            } else {
               return true 
            }
         }

         return false
      }

      // Checks password
      function checkPassword(passwordInput, repeatPasswordInput) {
         const passwordInputValue = passwordInput.val()
         const repeatPasswordInputValue = repeatPasswordInput.val()

         if(passwordInputValue === '') {
            displayError(passwordInput, "Enter a password")
         } else if(passwordInputValue.length <= 7) {
            displayError(passwordInput, "Password is too short. It must be at least 8 characters.")
         } else {
            if(repeatPasswordInputValue === '') {
               displayError(repeatPasswordInput, "Repeat your password") 
            } else if(passwordInputValue !== repeatPasswordInputValue) {
               displayError(repeatPasswordInput, "Those passwords didn't match. Try again") 
               $("#repeat-password-input").val('')
            } else {
               return true
            }
         }
         return false
      }

      // displays error depending on the input and the message
      function displayError(input, errorMessage) {
         input.addClass('error')
         input.parent().find(".validation").addClass('error')
         input.parent().find('small').text(errorMessage)
      }

      function displayError2(firstInput, secondInput, errorMessage) {
         firstInput.addClass('error')
         secondInput.addClass('error')
         firstInput.parent().find(".validation").addClass('error')
         firstInput.parent().find('small').text(errorMessage)
      }
   })
})