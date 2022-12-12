$(document).ready(() => {
    // removes error in an input
    $(".form-control").removeClass('error')

     // validates all the inputs
     if ( validateDeptName($("#dept-name")) & validateDeptDesc($("#dept-desc")) & 
     validateSupervisor($("#supervisor")) & validateLocation($("#location")) ) {
        console.log("SUCCESSFUL VALIDATION")
        //  $.ajax({
        //      url: '../crudDB/updateEmployeeData.php',
        //      method: 'POST',
        //      data: {
        //              updateProfile: "Update profile", id: $("#hiddenActiveUserId").val(), 
        //              firstname: $("input#firstname").val(), lastname: $("input#lastname").val(),
        //              dateOfBirth: $("#date-of-birth").val(), gender: $("#gender").val(),
        //              email: $("#email").val(),  phone: $("#phone").val(),
        //              department: $("#department").val(), jobPosition: $("#job-position").val(),
        //              supervisor: $("#supervisor").val(), hireDate: $("#hire-date").val(),
        //              salary: $("#salary").val()
        //          },  
        //      success: response => {
        //          // if successful, it will redirect to the updateEmployeeData server and update the values in the db
        //          window.location.reload()
        //      }
        //  })
     }

     // validates department name
     function validateDeptName(deptNameInput) {
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
})  