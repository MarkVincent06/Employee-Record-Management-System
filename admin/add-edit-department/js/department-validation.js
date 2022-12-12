$(document).ready(() => {
    $(".add-btn").click(() => {
        // removes error in an input
        $(".form-control").removeClass('error')

        // validates all the inputs
        if ( validateDeptName($("#dept-name")) & validateDeptDesc($("#dept-desc")) & 
        validateSupervisor($("#supervisor")) & validateLocation($("#location")) ) {
            $.ajax({
                url: '../crudDB/insertDepartmentData.php',
                method: 'POST',
                data: {
                        insertDeptData: "Inserting department data", deptName: $("#dept-name").val(),
                        deptDesc: $("#dept-desc").val(), supervisor: $("#supervisor").val(),
                        location: $("#location").val()
                    },  
                success: response => {
                    // if successful, it will redirect to the updateDepartmentData server and update the values in the db
                    window.location.href = '../admin-department.php'
                }
            })
        }

        
    })

    $(".update-btn").click(() => {
        // removes error in an input
        $(".form-control").removeClass('error')

        // validates all the inputs
        if ( validateDeptName($("#dept-name")) & validateDeptDesc($("#dept-desc")) & 
        validateSupervisor($("#supervisor")) & validateLocation($("#location")) ) {
            $.ajax({
                url: '../crudDB/updateDepartmentData.php',
                method: 'POST',
                data: {
                        id: $('#hiddenIdInput').val(),
                        updateDeptData: "Updating department data", deptName: $("#dept-name").val(),
                        deptDesc: $("#dept-desc").val(), supervisor: $("#supervisor").val(),
                        location: $("#location").val()
                    },  
                success: response => {
                    // if successful, it will redirect to the updateDepartmentData server and update the values in the db
                    window.location.href = '../admin-department.php'
                }
            })
        }

        
    })

    // validates department name
    function validateDeptName(deptNameInput) {
        if (deptNameInput.val().length === 0) {
            displayError(deptNameInput, "Enter department name")
            return false
        }

        return true
    }

    // validates department description
    function validateDeptDesc(deptDescInput) {
        if (deptDescInput.val().length === 0) {
            displayError(deptDescInput, "Enter department description")
            return false
        }

        return true
    }

    // validates supervisor
    function validateSupervisor(supervisorInput) {
        if (supervisorInput.val().length === 0) {
            displayError(supervisorInput, "Enter supervisor")
            return false
        }

        return true
    }

    // validates location
    function validateLocation(locationInput) {
        if (locationInput.val().length === 0) {
            displayError(locationInput, "Enter location")
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