<?php
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist";
            }else{
                if (isset($_FILES['file'])){

                }else{
                    echo "Please select an Image file";
                }
            }
        }else{
            echo $email . " is not a valid";
        }
    }else{
        echo "All input field are required!";
    }
?>