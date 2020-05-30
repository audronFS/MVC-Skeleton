<?php if(session_destroy()) {
   echo "<script>window.location.href = 'index.php?controller=user&action=readAll';</script>"; //3. if logged in, send the user to readAll.php
   exit;
   }
   ?>

