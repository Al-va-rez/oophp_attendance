<?php
    require_once 'classLoaders.php';

    
    /* --- USERS --- */
    // register
    if (isset($_POST['registerReq'])) {

        $userRole = $obj_Database->sanitizeInput($_POST['userRole']);
        $username = $obj_Database->sanitizeInput($_POST['username']);
        $firstName = $obj_Database->sanitizeInput($_POST['firstName']);
        $lastName = $obj_Database->sanitizeInput($_POST['lastName']);
        $tempPassword = $obj_Database->sanitizeInput($_POST['password']);
        $confirmPassword = $obj_Database->sanitizeInput($_POST['confirmPassword']);


        if ($tempPassword == $confirmPassword) {

            if ($obj_Database->validatePassword($tempPassword)) { // check password strength

                $password = password_hash($tempPassword, PASSWORD_DEFAULT); // encrypt password

                $data = [
                    "userRole" => $userRole,
                    "username" => $username,
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "password" => $password
                ];

                $result = $obj_Database->create("users", $data);

                echo $result;

            } else {
                echo "Weak password";
            }
        } else {
            echo "Passwords not the same";
        }
        
    }

    // login
    if (isset($_POST['loginReq'])) {

        $username = $obj_Database->sanitizeInput($_POST['username']);
        $password = $obj_Database->sanitizeInput($_POST['password']);

        if ($obj_User->login($username, $password)) {

            if ($_SESSION['role'] == 'Admin') {
                echo "Login as admin";
            } else if ($_SESSION['role'] == 'Student') {
                echo "Login as student";
            }

        } else {
            echo "Incorrect Username/Password";
        }
    }

    // logout
    if (isset($_GET['btn_Logout'])) {
        $obj_User->logout();
        header('Location: ../index.php');
    }


    if (isset($_POST['courseReq'])) {
        $code = $obj_Course->sanitizeInput($_POST['courseCode']);
        $title = $obj_Course->sanitizeInput($_POST['courseTitle']);
        $units = $obj_Course->sanitizeInput($_POST['courseUnits']);

        $data = [
            "code" => $code,
            "title" => $title,
            "units" => $units
        ];

        $result = $obj_Course->createCourse($data);

        if ($result) {
            echo "Success";
        } else {
            echo "Something went wrong";
        }
    }

?>