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
    public function login(){
        //check for post request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
            header("Location: /login");
            exit;
        }    
        
        //process form
        $data =[
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
        if(empty($data['login_err']) && empty($data['password_err'])){
            //login user
            $user = $this->user->login($data['email']);

                //check if user exists
                if ($user) {
                    //verify the password
                    if (password_verify($data['password'], $user['password'])){
                        //check user status
                        if ($user['status'] === 'desactive') {
                            $data['login_err'] = 'Inactive user. Please verify your email';
                        }
                        
                        else{
                            // set session variables and login the user
                            session_start();
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




   
}
