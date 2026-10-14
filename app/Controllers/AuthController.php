<?php

namespace App\Controllers;

use App\Models\User;
class AuthController
{
    public function loginView()
    {
        view(file_path: 'auth.login');
    }

    public function login()
    {
        $name = sanitizeInput($_POST['name']);
        $pass = sanitizeInput($_POST['password']);
        if (isset($name) && isset($pass)) {
            $user = new User();
            $userinfo = $user->login($name, $pass, 'admin');
            if ($userinfo) {
                $_SESSION['success'][] = 'Welcome ! You are Successfully Logged In.';
                $_SESSION['temp']=$userinfo['user_id'];
                return redirect('/admin');
            }
        } else {
            $_SESSION['error'][] = 'Please fill Up Required Field !';
            return redirect('/login');
        }

    }
    public function signupView()
    {
        view('auth.signup');
    }

    public function signup()
    {
        $userId = generateUId();
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $pass = sanitizeInput($_POST['password']);
        $ip = getClientIP();
        $data = [
            'user_id' => $userId,
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
            'ip'=>$ip
        ];
        if (isset($name) && isset($email) && isset($pass)) {
            $user = new User();
            $userinfo = $user->signup($data);
            if ($userinfo) {
                // $_SESSION['user'] = ['userid' => $userinfo[0], 'name' => $userinfo[1]];
                $_SESSION['success'][] = 'Welcome ! You are Successfully Registered.';
                return redirect('login');
            }
        } else {
            $_SESSION['error'][] = 'Please fill Up Required Field !';
            return redirect('register');
        }


    }

}