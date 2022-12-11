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
    <link rel="stylesheet" href="css/login.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- LOGIN VALIDATION JS -->
    <script src="js/login-validation.js"></script>

    <!-- SWEET ALERT CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <title>Login | Employee Record Management System</title>
</head>
<body>
    <header>
        <img class="main-logo" src="img/main-logo.png" alt="The main logo of this website">
        <h1>Employee Records Management System</h1>
    </header>

    <main>
        <div class="login-wrapper">
            <div class="left-section">
                <img src="img/login/login-illustration.png" alt="Woman using a laptop in her room">
                <p> Don't have an account? <a href="sign-up.php" class="sign-up-link" >Signup</a></p>
            </div>
            <div class="right-section">
                <h2>Login</h2>

                <form class="login-form" action="crudDB/login-process.php" method="POST">
                    <div class="form-control">
                        <i class="fa-solid fa-envelope"></i>
                        <input id="email" type="text" placeholder="Email" name="email">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small>Please enter your email</small>
                        </div>
                    </div>
                    <div class="form-control">
                        <i class="fa-solid fa-key"></i>
                        <input id="password" type="password" placeholder="Password" name="password">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small>Please enter your password</small>
                        </div>
                    </div>
                    <a href="sign-up.php" class="forgot-pass-link">Forgot Password?</a>
                    <input class="login-btn" type="submit" value="Login" name="login">
                </form>
            </div>
        </div>
    </main>
</body>
</html>