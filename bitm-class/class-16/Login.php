<?php

class Login {
    
    protected $link;
    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', '', 'bitm-php-64');
    }
    
    public function adminLoginCheck($data) {
        $email = $data['email'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        if(mysqli_query($this->link, $sql)) {
            $queryResult = mysqli_query($this->link, $sql);
            $userInfo = mysqli_fetch_assoc($queryResult);
            if($userInfo) {
                session_start();
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];
                
                header('Location: dashboard.php');
            } else {
                $message = "Please use valid email adress & password";
                return $message;
            }
        } else {
            die('Query Probem'.mysqli_error($this->link));
        }
    }
    
    public function adminLogout() {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        
        header('Location: index.php');
    }
    
    
    
    
}
