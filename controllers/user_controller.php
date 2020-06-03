<?php

//Controller does the calls to the functionalities inside the models.

class UserController {

    public function create() {
        // we expect a url of form ?controller=blogpost&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/user/create.php');
        } else {
            User::Register();  
            echo '<script language="javascript">';
            echo 'alert("Registration successful! Please sign in.")';
            echo '</script>';
            echo "<script>window.location.href = 'index.php?controller=user&action=login ';</script>";
            
        }
        
    }

    public function login() {
        // we expect a url of form ?controller=user&action=read   /check?
        // if it's a GET request display a blank form for..
        // else it's a POST so add to the database and redirect to..
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/user/login.php');
        } else {
            $register_number = User::login();
            if ($register_number != 0) {
                 $_SESSION["Username"] = $_POST["Username"];
                 $_SESSION["Hashcode"] = $_POST["Hashcode"];
                 echo "<script>window.location.href = 'index.php?controller=blogpost&action=readAll';</script>";
                 //call('blogpost', 'readAll');               
            } else {
                require_once('views/user/login.php');
                echo '<script language="javascript">';
                echo 'alert("Wrong password")';
                echo '</script>';
            }
        }
    }
    public function logout() {       
        User::logout();
        echo "<script>window.location.href = 'index.php?controller=pages&action=home ';</script>";
        //call('pages', 'home');
        
    }

   

}

?>