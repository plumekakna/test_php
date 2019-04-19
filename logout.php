<?php
    session_start();

    //clear session
    if (isset($_SESSION['user_name'])) {
        session_destroy();
        unset($_SESSION['user_name']);
    }

    if (isset($_SESSION['admin_name'])) {
        session_destroy();
        unset($_SESSION['admin_name']);
    }

    //back to index.php
    header("Location: index.php");
    
?>