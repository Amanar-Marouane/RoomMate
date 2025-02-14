<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/login-register.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
    </style>
    <title>sign in</title>
</head>

<body>
    <div class="singin_container">
        <div class="side_image">
            <img src="../assets/rommate.png" alt="">
        </div>
        <div class="signin_form">
            <div class="signin">
                <h2>Roomate.ma</h2>
                <div>
                    <h3>Login to your account</h3>
                    <h4>find your roommate</h4>
                </div>
                <p id="signin_p"">____ sign in with email ____</p>
                <form action="/login" method="post">
                    <label for="email">Email</label>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" name="email" >
                </div>
                <?php if (!empty($data['email_err'])): ?>
                   <p class="error_msg"><?php echo $data['email_err']; ?></p>
                <?php endif; ?>

                <label for="password">Password</label>
                <div class="input-container">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="password" >
                </div>
                <?php if(!empty($data['password_err'])): ?>
                    <p class="error_msg"><?php echo $data['password_err']; ?></p>
                <?php endif; ?>

                <?php if (!empty($data['login_err'])): ?>
                    <p class="error_msg"><?php echo $data['login_err']; ?></p>
                <?php endif; ?>

                <button type="submit" name="submit">Log in</button>
                </form>
                <p id=""><a id="" href="/forgotpassword">Forgot Password ?</a></p>
                <p id="register_p">Not registered yet? <a id="register_a" href="/register">Create your account now</a></p>
            </div>
        </div>
    </div>
</body>

</html>