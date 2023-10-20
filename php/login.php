<?php
    session_start();
    include_once "config.php";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($email) && !empty($password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sqlSearchEmail = mysqli_query($conn, "SELECT * FROM users WHERE `email` = '{$email}' AND `password` = MD5('{$password}')");
            if (mysqli_num_rows($sqlSearchEmail) > 0){
                $userInformation = mysqli_fetch_assoc($sqlSearchEmail);
                    $status = "Active now";
                    $_SESSION['unique_id'] = $userInformation['unique_id'];
                    $sqlUpdateStatus = mysqli_query($conn, "UPDATE `users` SET `status`='{$status}' WHERE `email` = '{$email}'");
                    if ($sqlUpdateStatus){
                        echo "Success";   
                    }else{
                        echo "Something went wrong, Please try again";
                    }
            }else{
                echo "Unvalid email or password";
            }
        }else{
            echo $email . " is not a valid";
        }
    }else{
        echo "All input fields are required!";
    }
?>
