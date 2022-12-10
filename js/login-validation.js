$(document).ready(() => {
    $(".login-btn").click(e => {
        // removes error in an input
        $(".form-control").removeClass('error')

        // checks email and password inputs
        if ( checkEmail($("#email")) & checkPassword($("#password")) ) {
            const doesAccountExist = checkAccount( $("#email"), $("#password") ) 
            
            if(doesAccountExist) {
                // if it exist, it will redirect to the login process
            } else {
                showToastErrorMsg()
                $("#password").val("")
                e.preventDefault()
            }
        } else {
            e.preventDefault()
        }
    })

    // validates email
    function checkEmail(emailInput) {
        const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const isEmailValid = emailRegex.test(emailInput.val())
        
        if(emailInput.val() === '') {
            displayInputError(emailInput, "Please enter your email address")
            return false
        }

        if(!isEmailValid) {
            displayInputError(emailInput, "Invalid email address")
            return false
        }

        return true
    }

    // validates password
    function checkPassword(passwordInput) {
        if(passwordInput.val() === "") {
            displayInputError(passwordInput, "Please enter your password")
            return false
        } else {
            return true
        }
    }

    // checks if the account exists and is correct
    function checkAccount(emailInput, passwordInput) {
        let success = false

        // using ajax to fetch the email and password data from the database
        $.ajax({
            url: './crudDB/getEmailAndPassData.php',
            method: 'POST',
            async: false,
            success: response => {
                emailAndPassData = JSON.parse(response)
                
                for(let account of emailAndPassData) {
                    if(account.email === emailInput.val() && account.password === passwordInput.val()) {
                        success = true
                    }
                }
            }
        })
        
        // returns a boolean depending wether the account exist or not
        return success ? true : false
    }

     // displays input error msg
     function displayInputError(input, errorMessage) {
        const formControlEl = input.parent()
        
        // this will focus the error input
        input.focus()
           
        formControlEl.addClass('error')
        formControlEl.find('small').text(errorMessage)
    }

    // shows error messgae if the account does not exist yet in the db
    function showToastErrorMsg() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        
        Toast.fire({
        icon: 'error',
        title: "Incorrect username or password!",
        width: '26em',
        color: 'rgba(255, 0, 0, .6)'
        })
    }
})
