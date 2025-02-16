<?php

namespace app\controllers;



use app\models\User;
use App\Models\MailerModel;
use App\Models\Offer;


class UserController
{
    private $user;
    private $mailModel;
    private $annonce;
    public function __construct()
    {
        $this->user = new User;
        $this->mailModel = new MailerModel;
        $this->annonce = new Offer;
    }

    public function showProfile()
    {
        $user_id = $_SESSION["user_id"] ?? 1;
        $info = $this->user->userInfo($user_id);
        $offers = $this->annonce->ShowMyAnnounce($user_id, "Offre");
        $demands = $this->annonce->ShowMyAnnounce($user_id, "Demande");
        extract($info);
        include __DIR__ . "/../views/profile.view.php";
    }

    

    // show register page 
    public function showRegister($data = [])
    {
        include __DIR__ . '/../views/register.php';
    }

    // show login page 
    public function showLogin($data = [])
    {
        include __DIR__ . '/../views/login.php';
    }

    // process the login form
    public function login()
    {
        //process form
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'login_err' => '',
            'email_err' => '',
            'password_err' => ''
        ];

        //validate inputs
        if (empty($data['email'])) {
            $data['email_err'] = 'Please enter your email';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_err'] = 'Please enter a valid email address';
        }

        if (empty($data['password'])) {
            $data['password_err'] = 'Please enter your password';
        }
        //if there is no errors
        if (empty($data['login_err']) && empty($data['password_err'])) {
            //login user
            $user = $this->user->login($data['email']);

            //check if user exists or not
            if (!$user) {
                $data['login_err'] = 'User not found';
            }

            if ($user) {
                //verify the password
                if (!password_verify($data['password'], $user['password'])) {
                    $data['password_err'] = 'Incorrect password';
                }

                if (password_verify($data['password'], $user['password'])) {
                    //check user status

                    // var_dump($user);
                    if ($user['status'] === 'desactive') {
                        $data['login_err'] = 'Inactive user. Please verify your email';
                        $this->showLogin($data);
                    } else {
                        // set session variables and login the user
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['username'] = $user['full_name'];
                        $_SESSION['role'] = $user['role'];

                        header("Location: /profile");
                    }
                } else {
                    $data['login_err'] = 'Invalid password';
                }
            } else {
                $data['login_err'] = 'No user found with that email';
            }
        }

        //load view with errors
        $this->showLogin($data);
        exit();
    }

    // register
    public function register()
    {
        //check for post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize post data 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'year_of_study' => trim($_POST['year_of_study']),
                'origin_city' => trim($_POST['origin_city']),
                'current_city' => trim($_POST['current_city']),
                'bio' => trim($_POST['bio']),
                'photo' => $_FILES["photo"] ?? null,
                'reference' => trim($_POST['reference']),
                'preferences' => isset($_POST['preferences']) ? json_encode($_POST['preferences']) : json_encode([]),
                'empty_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'exists_err' => '',
                'domain_err' => '',
            ];

            // Validate email domain
            if (!empty($data['email'])) {
                $emailDomain = substr(strrchr($data['email'], "@"), 1);
                if ($emailDomain !== 'gmail.com') {
                    $data['domain_err'] = 'Please use a valid email address: "...@youcode.ma"';
                }
            }

            //validate inputs
            if (empty(($data['username']) || ($data['email']) || ($data['password']) || ($data['origin_city']) || ($data['current_city']) || ($data['bio'])) || ($data['domain_err'])) {
                $data['empty_err'] = "All fields are required!";
            } elseif (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $data['username'])) {
                $data['username_err'] = "Username must be 4-20 characters long and can only contain letters, numbers, and underscores.";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = "Invalid email address.";
            } elseif (strlen($data['password']) < 8 || !preg_match('/[A-Za-z]/', $data['password']) || !preg_match('/[0-9]/', $data['password']) || !preg_match('/[@$!%*?&#]/', $data['password'])) {
                $data['password_err'] = "Password must be at least 8 characters long and include letters, numbers, and special characters.";
            }

            //check if user exists
            if ($this->user->userExists($data['username'], $data['email']) == true) {
                $data['empty_err'] = "User already exists!";
            }

            //if there is no errors proceed to register 
            if (empty($data['empty_err']) && empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err'])) {
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // $pirture = $this->insertSingleImage($data['photo']);

                // Vérifier et traiter l'image
                $picture = null;
                if ($data['photo'] && $data['photo']['error'] === UPLOAD_ERR_OK) {
                    $uploadResult = $this->insertSingleImage($data['photo']);
                    if (isset($uploadResult['path'])) {
                        $picture = $uploadResult['path'];
                        // var_dump($picture);
                    } else {
                        $data['photo_err'] = $uploadResult['error'];
                    }
                }
                //register user
                if ($this->user->registerUser($data['username'], $data['email'], $data['password'], $data['year_of_study'], $data['origin_city'], $data['current_city'], $data['bio'], $data['reference'], $data['preferences'], $picture)) {
                    $this->sendCodeToEmail($data['username'], $data['email']);
                    exit;
                } else {
                    die('something went wrong');
                }
            }
            $this->showRegister($data);
            exit();
        }
    }


    public function insertSingleImage($photo)
    {
        $upload_directory = "assets/";

        // Vérifier si une image a bien été envoyée
        if (!isset($photo["tmp_name"]) || empty($photo["tmp_name"])) {
            return ["error" => "Aucune image fournie."];
        }

        // Extensions autorisées
        $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
        $file_extension = strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));

        // Vérifier si l'extension est valide
        if (!in_array($file_extension, $allowed_extensions)) {
            return ["error" => "Extension de fichier non autorisée. Formats acceptés : jpg, jpeg, png, gif."];
        }

        // Générer un nom unique pour l'image
        $new_image_name = uniqid("img_", true) . '.' . $file_extension;
        $target_file = $upload_directory . $new_image_name;

        // Déplacer l'image vers le dossier de destination
        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
            return [
                "stored_name" => $new_image_name,
                "path"        => $target_file,
            ];
        } else {
            return ["error" => "Erreur lors de l'upload de l'image."];
        }
    }



    // verify compte by code  ***************************************************************************************************************

    public function sendCodeToEmail($full_name, $email)
    {
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $res = $this->user->addCode($email, $code, $expiry);

        if ($res) {
            $sujet = "Vérification de compte ";
            $body = "<p>Bonjour,$full_name</p> <p>Votre Code e vérification est : $code</p> <p>Cordialement,<br><strong>Roomate tTams</strong></p>";

            $this->mailModel->envoyerEmail($email, "", $sujet, $body);

            header("Location: /verifycompte?email=$email");
        }
    }

    public function verifyCompteForm()
    {

        include __DIR__ . '/../views/verifycompte.php';
    }

    public function verifyCode()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email_verify'];
            $codeVerify = $_POST['code_verify'];

            $res = $this->user->verifyCode($email, $codeVerify);

            if ($res) {

                $result = $this->user->updateStatusByEmail("active", $email);
                if ($result) {

                    $sujet = "Validation de compte ";
                    $body = "<p>Bonjour,</p> <p>Votre Compte est Valider.</p> <p>Cordialement,<br><strong>Roomate Teams</strong></p>";

                    $this->mailModel->envoyerEmail($email, "", $sujet, $body);

                    $result = $this->user->deleteCodeByEmail($email);

                    header("Location: /login");
                }
            }
        }
    }



    // reset password 

    public function forgotPassword()
    {
        include __DIR__ . '/../views/forgotPassword.php';
    }

    public function resetPassword()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['forgotPsswd'])) {
                $email = $_POST['email'];

                $user = $this->user->getIdByemail($email);

                if ($user) {
                    $token = bin2hex(random_bytes(16));
                    $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

                    $res = $this->user->addToken($email, $token, $expiry);

                    if ($res) {
                        $resetLink = "http://localhost:8000/initialpsswd?token=$token";
                        $sujet = "Réinitialisation de mot de passe";
                        $body = "<p>Bonjour,</p>  
                        <p>Cliquez sur ce lien pour réinitialiser votre mot de passe : <a href='$resetLink'>Click ici</a></p>  
                        <p>Cordialement,<br>  
                        <strong>Rommate</strong></p>";

                        $this->mailModel->envoyerEmail($email, "", $sujet, $body);

                        header("Location: /forgotPassword");
                    }
                }
            }
        }
    }
    public function initialPsswd()
    {
        include __DIR__ . '/../views/initialPsswd.php';
    }

    public function restartPsswd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['resetpsswd'])) {
                $token = $_POST['token'];

                $res = $this->user->getEmailByToken($token);
                var_dump($res);

                $password = $_POST['password'];

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $userData = [$res['email'], $hashed_password];
                // var_dump($userData);
                $user = $this->user->restartPassword($userData);

                if ($user) {
                    $user = $this->user->deleteToken($res['email']);

                    header('Location: /login');
                } else {
                    header("Location: /initialpsswd?token=$token");
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }
}
