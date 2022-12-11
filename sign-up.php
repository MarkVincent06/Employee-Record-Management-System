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
    <link rel="stylesheet" href="css/sign-up.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQUERY MINIFIED CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>

    <!-- VALIDATION JS -->
    <script src="js/sign-up-validation.js"></script>

    <title>Sign up | Employee Record Management System</title>
</head>
<body>
    <header>
        <img class="main-logo" src="img/main-logo.png" alt="The main logo of this website">
        <h1>Employee Records Management System</h1>
    </header>

    <main>
        <div class="sign-up-wrapper">
            <div class="left-section">
                <h2>Sign up</h2>
                <form class="sign-up-form" action="./crudDB/sign-up-process.php" method="POST">

                    <!-- First name and last name inputs -->
                    <div class="form-control2">
                        <input id="firstname-input" type="text" placeholder="First Name" name="firstname">
                        <input id="lastname-input" type="text" placeholder="Last Name" name="lastname">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                        </div>
                    </div>

                    <!-- Employee code input -->
                    <div class="form-control">
                        <input id="emp-code-input" type="text" placeholder="Employee Code" name="emp-code">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-control">
                        <input id="email-input" type="text" placeholder="Email Address" name="email">
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                        </div>
                    </div>

                    <!-- Password inputs -->
                    <div class="form-control2">
                        <input id="password-input" type="password" placeholder="Password" name="password">
                        <input id="repeat-password-input" type="password" placeholder="Repeat Password" name="repeat-password">
                        <p class="password-tip">Password must contain at least 8 characters.</p>
                        <div class="validation">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <small></small>
                        </div>
                    </div>
                    <input id="sign-up-btn" class="sign-up-btn" type="submit" value="Sign up" name="sign-up">
                </form>
            </div>
            <div class="right-section">
                <img src="img/sign-up/sign-up-illustration.png" alt="Guy using a gint smartphone">
                <p> Already have an account? <a href="login.php" class="login-link">Login</a></p>
            </div>
        </div>
    </main>
</body>
</html>