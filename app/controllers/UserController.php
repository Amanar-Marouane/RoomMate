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
    public function showLogin()
    {
        $data = [
            'email' => '',
            'password' => '',
            'login_err' => '',
            'email_err' => '',
            'password_err' => ''
        ];

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
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['role'] = $user['role'];

                        //redirect based on role
                        if ($user['role'] === 'admin') {
                            header('location: ../../public/views/admin.php');
                            exit;
                        } elseif ($user['role'] === 'student') {
                            // header('location: ../../public/views/homepage.php');
                            echo "welcome";
                            exit;
                        }
                    }
                } else {
                    $data['login_err'] = 'Invalid password';
                }
            } else {
                $data['login_err'] = 'No user found with that email';
            }
        }

        //load view with errors
        include __DIR__ . '/../views/login.php';
    }

    // public function register()
    // {
    //     //check for post request
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         //process form
    //         //sanitize post data 
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [
    //             'username' => trim($_POST['username']),
    //             'email' => trim($_POST['email']),
    //             'password' => trim($_POST['password']),
    //             'role' => trim($_POST['role']),
    //             'empty_err' => '',
    //             'username_err' => '',
    //             'email_err' => '',
    //             'password_err' => '',
    //             'role_err' => '',
    //             'exists_err' => '',
    //         ];

    //         //validate inputs
    //         if (empty($data['username']) || empty($data['email']) || empty($data['password']) || empty($data['role'])) {
    //             $data['empty_err'] = "All fields are required!";
    //         } elseif (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $data['username'])) {
    //             $data['username_err'] = "Username must be 4-20 characters long and can only contain letters, numbers, and underscores.";
    //         } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    //             $data['email_err'] = "Invalid email address.";
    //         } elseif (strlen($data['password']) < 8 || !preg_match('/[A-Za-z]/', $data['password']) || !preg_match('/[0-9]/', $data['password']) || !preg_match('/[@$!%*?&#]/', $data['password'])) {
    //             $data['password_err'] = "Password must be at least 8 characters long and include letters, numbers, and special characters.";
    //         } elseif (empty($data['role'])) {
    //             $data['role_err'] = "Please select a role.";
    //         }

    //         //check if user exists
    //         if ($this->user->userExists($data['username'], $data['email']) == true) {
    //             $data['empty_err'] = "User already exists!";
    //             $this->view('users/register', $data);
    //         }

    //         //if there is no errors proceed to register 
    //         if (empty($data['empty_err']) && empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['role_err'])) {
    //             //hash password
    //             $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    //             //register user
    //             if ($this->user->registerUser($data)) {
    //                 header('location: ' . URLROOT . '/users/login');
    //             } else
    //                 die('something went wrong');
    //         } else {
    //             // echo "failed";
    //             header('location: ../../public/views/login.php');
    //         }
    //     } else {
    //         $data = [
    //             'username' => '',
    //             'email' => '',
    //             'password' => '',
    //             'role' => '',
    //             'register_err' => '',
    //         ];

    //         //load view of register form
    //         header('location: ../../public/views/register.php');
    //     }
    // }
}
