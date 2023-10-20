<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sqlSearchEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sqlSearchEmail) > 0){
                echo "$email - This email already exist";
            }else{
                if (isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_tmp_name = $_FILES['image']['tmp_name'];

                    $img_exploade = explode('.', $img_name);
                    $img_ext = end($img_exploade);

                    $extentios = ['png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG'];
                    if (in_array($img_ext, $extentios) === true){
                        $time = time();
                        $new_image_name = $time.$img_name;
                        if(move_uploaded_file($img_tmp_name, "images/".$new_image_name)){
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);

                            $sqlInsertUser = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
                            if ($sqlInsertUser){
                                $sqlCheckInsertUser = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sqlCheckInsertUser) > 0){
                                    $userInformation = mysqli_fetch_assoc($sqlCheckInsertUser);
                                    $_SESSION['unique_id'] = $userInformation['unique_id'];
                                    echo "Success";
                                }else{
                                    echo "Something went wrong, Please try again";
                                }
                            }
                        }else{
                            echo "Something went wrong when uploade image, Please try again";
                        }
                    }else{
                        echo "Please select an image file - jpg, jpeg, png";
                    }
                }else{
                    echo "Please select an image file!";
                }
            }
        }else{
            echo $email . " is not a valid";
        }
    }else{
        echo "All input fields are required!";
    }
?>