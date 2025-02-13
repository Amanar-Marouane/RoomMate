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
    <title>sign up</title>
</head>

<body>
    <div class="singin_container">
        <div class="signin_form">
            <div class="signin">
                <h2>Roomate.ma</h2>
                <div>
                    <h3>Create your account</h3>
                    <h4>find your roommate</h4>
                </div>
                <p id="signin_p">____ Please fill these informations ____</p>
                <form action="" method=" post">
                    <label for="email">Username</label>
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="username" required>
                </div>
                <label for="email">Email</label>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" name="email" required>
                </div>
                <label for="password">Password</label>
                <div class="input-container">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="password" required>
                </div>
                <button id="next" type="button" name="submit">next ▶</button>

                <!-- Hidden Additional Fields Container -->
                <div id="additional-section" style="display:none;">
                    <div class="additional_section">
                        <div class="additional_1">
                            <label for="origin">Origin City</label>
                            <div class="input-container">
                                <input type="text" name="origin" id="origin"  required >
                            </div>
                            <label for="current">Current City</label>
                            <div class="input-container">
                                <input type="text" name="current" id="current" required>
                            </div>
                            <label for="biography">Biography</label>
                            <div class="input-container">
                                <textarea name="biography" id="biography" placeholder="Tell us about yourself" required ></textarea>
                            </div>
                            <label for="photo">Photo</label>
                            <div class="input-container">
                                <input type="file" name="photo" id="photo" required style="display:none;">
                                <label for="photo" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload"></i> Choose File
                                    <style>
                                        .custom-file-upload:hover {
                                            color: blue;
                                            border: blue solid 1px;
                                            border-radius: 5px;
                                            padding: 5px 10px;
                                            cursor: pointer;
                                        }
                                    </style>
                                </label>
                            </div>
                        </div>

                        <div class="additional_2">
                            <label for="grade">Grade</label>
                            <div class="input-container">
                                <select name="grade" id="grade" required >
                                    <option value=""></option>
                                    <option value="first">First Year</option>
                                    <option value="second">Second Year</option>
                                </select>
                            </div>
                            <label for="preferences">Preferences</label>
                            <div class="input-container">
                                <select name="preferences[]" id="preferences" required >
                                    <option value=""></option>
                                    <option value="smoking">Smoking</option>
                                    <option value="animal_lover">Animal Lover</option>
                                    <option value="hospitable">Hospitable</option>
                                </select>
                            </div>
                            <label for="reference">Reference</label>
                            <div class="input-container">
                                <input type="text" name="reference" id="reference" placeholder="Referenced by who" required >
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <button id="go_back" type="button" >◀ Go Back</button>
                        <button id="submit_all" type="submit" name="submit">Submit</button>
                    </div>
                </div>
                </form>
                <p id="register_p">Already have an account? <a id="register_a" href="">Log in now</a></p>
            </div>
        </div>

        <div class="side_image_register">
            <img src="../assets/rommate.png" alt="">
        </div>
    </div>

    <script src="../JS/register.js"></script>
</body>

</html>