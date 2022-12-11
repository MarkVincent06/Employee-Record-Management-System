$(document).ready(() => {
    $("#admin").click(() => {
        
        Swal.fire({
            title: 'Admin Login',
            color: '#407BFF',
            html:
                '<input id="admin-username" class="admin-input" placeholder="Enter username">' +
                '<input id="admin-password" class="admin-input" placeholder="Enter password" type="password">',
            showCancelButton: true,
            confirmButtonText: 'Login',
            confirmButtonColor: '#407BFF',
            focusConfirm: false,
            reverseButtons: true,
            customClass: {
                validationMessage: 'swal-validation-msg'
            },
            preConfirm: () => {
                if($("#admin-username").val() === 'admin' && $("#admin-password").val() === 'admin') {
                    return true
                } else {
                    $(".admin-input").addClass('error')
                    Swal.showValidationMessage("Incorrect username or password")
                    $("#admin-password").val("")
                }

                return false
            }
        }).then(response => {
            if(response.isConfirmed) {
                window.location.href = './crudDB/admin-login-process.php'
            }
        })

    })
})