<?php
namespace app\controllers;


use app\models\User;

class UserController
{
    private $user;
    public function __construct()
    {
        $this->user = new User;
    }

    public function showProfile()
    {
        $user_id = $_SESSION["user_id"] ?? 1;
        $info = $this->user->userInfo($user_id);
        extract($info);
        include __DIR__ . "/../views/profile.view.php";
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

            //check if user exists
            if ($user) {
                //verify the password
                if (password_verify($data['password'], $user['password'])) {
                    //check user status
                    if ($user['status'] === 'desactive') {
                        $data['login_err'] = 'Inactive user. Please verify your email';
                    } else {
                        // set session variables and login the user
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['username'] = $user['full_name'];
                        $_SESSION['role'] = $user['role'];

                            //redirect based on role
                            if ($user['role'] === 'admin') {
                                // $this->show();
                                exit;
                            } elseif ($user['role'] === 'student') {
                                // $this->showHomepage();
                                echo "welcome";
                                exit;
                            }
                        }
                    } else {
                        $this->showLogin($data);
                    }
                } else {
                    $this->showLogin($data);
                }
            
            }

        //load view with errors
        include __DIR__ . '/../views/login.php';
    }

    // show register page 
    public function showRegister($data = [])
    {
          include __DIR__ . '/../views/register.php';
    }

    public function register(){
        //check for post request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form
             //sanitize post data 
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             $data =[
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'year_of_study' => trim($_POST['year_of_study']),
                'origin_city' => trim($_POST['origin_city']),
                'current_city' => trim($_POST['current_city']),
                'bio' => trim($_POST['bio']),
                'photo' => null,
                'reference' => trim($_POST['reference']),
                'preferences' => isset($_POST['preferences']) ? json_encode($_POST['preferences'], true) : '', // Convert preferences array to JSON string
                'empty_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'exists_err' => '',
             ];

             //validate inputs
             if (empty(($data['username']) || ($data['email']) || ($data['password']) || ($data['origin_city']) || ($data['current_city']) || ($data['bio']))){
                $data['empty_err'] = "All fields are required!";            
            } elseif (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $data['username'])) {
                $data['username_err'] = "Username must be 4-20 characters long and can only contain letters, numbers, and underscores.";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = "Invalid email address.";
            } elseif (strlen($data['password']) < 8 || !preg_match('/[A-Za-z]/', $data['password']) || !preg_match('/[0-9]/', $data['password']) || !preg_match('/[@$!%*?&#]/', $data['password'])) {
                $data['password_err'] = "Password must be at least 8 characters long and include letters, numbers, and special characters.";
            }

            //check if user exists
            if($this->user->userExists($data['username'], $data['email']) == true){
                $data['empty_err'] = "User already exists!";
            }

            //if there is no errors proceed to register 
            if(empty($data['empty_err']) && empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err'])){
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //register user
                if($this->user->registerUser($data['username'], $data['email'], $data['password'], $data['year_of_study'], $data['origin_city'], $data['current_city'], $data['bio'], $data['photo'], $data['reference'], $data['preferences'])){
                    $this->showLogin();
                    exit;
                }else{
                    die ('something went wrong');
                }
            }
            $this->showRegister($data);
            exit();
        }
        
    }




   
}
