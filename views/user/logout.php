<?php 

//session_start();
//session_unset();
//$_SESSION['authorized']== false;
session_destroy();
//if(session_destroy()) {
   echo "<script>window.location.href = 'index.php';</script>"; //3. if logged in, send the user to readAll.php
//   exit;
//   }
//   ?>

