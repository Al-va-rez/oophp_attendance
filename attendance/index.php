<?php

    // user not in homepage but stil logged in
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
        
        switch ($_SESSION['role']) {

            case 'Admin':
                header('Location: user_Admin/index.php');
                break;
            
            case 'Student':
                header('Location: user_Student/index.php');
                break;
           
            default:
                header('Location: login.php');
                break;
        }
    // user not logged in
    } else {
        header('Location: login.php');
    }
    
?>