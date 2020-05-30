<?php session_start(); //1. start the php session_start variable 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PAWSOME - Our Adventurous Pets </title>
    </head>
    <body>
        <?php


    require_once('connection.php');
        
    if (isset($_GET['controller']) && isset($_GET['action'])) { //if user clicks on login on nav bar 
        if($_GET['controller'] == 'user' && $_GET['action'] == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST') { //if user clicks on login in the navbar & posts their login
            header('Location: index.php?controller=blogpost&action=readAll'); //header (relocation) has to go after we do the check. If the above, redirect them to readAll welcome page
        } else {
            $controller = $_GET['controller'];
            $action     = $_GET['action'];  
        }
  } else {
        $controller = 'pages';//to change to blogpost controller. first signpost
        $action     = 'home';
  }
    require_once('views/layout.php');
    //When you see require once and the file path - imagine as if all that code is underneath it.
    
    
//    if (isset($_GET['controller']) == 'user' && ($_GET['action']) == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST' {
//        login();
//    } elseif (isset($_GET['controller']) == 'user' && ($_GET['action']) == 'logout' && $_SERVER['REQUEST_METHOD'] == 'POST' {
//        logout();
//    } else {
//        header('Location: index.php?controller=blogpost&action=readAll')
//    }
    
        
        ?>
    </body>
</html>
