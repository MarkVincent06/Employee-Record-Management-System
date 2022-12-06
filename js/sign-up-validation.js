$(document).ready(() => {
   $("#sign-up-btn").click(e => {

      // submits the form if all the validations return true
      if(checkFirstNameAndLastName($, newLastName.value.trim())
      & checkEmail(newEmail.value.trim())
      & checkPassword(newPassword.value.trim(), confirmPassword.value.trim())) {
         e.preventDefault() // remove later
      } else {
         e.preventDefault()
      }

      // Checks first name and last name
      function checkFirstNameAndLastName(firstNameValue, lastNameValue) {
         if(firstNameValue === '' || lastNameValue == '') {
            if(firstNameValue === '' && lastNameValue === '') {
               set2ErrorsFor(newFirstName, newLastName, "Enter first and last names")
            } else if(firstNameValue === "") {
               setErrorFor(newFirstName, "Enter first name") 
            } else if(lastNameValue === "") {
               setErrorFor(newLastName, "Enter last name")
            } 
         } else if( (firstNameValue.length + lastNameValue.length) <=2) {
            setErrorFor(newFirstName, "First or last names must contain at least 3 characters")
         } else {
            return true
         }
         return false
      }
   })
})