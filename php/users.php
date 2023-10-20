<?php
    session_start();
    include_once "config.php";
    $usersInformation = mysqli_query($conn, "SELECT * FROM users");
    $output = "";
    if (mysqli_num_rows($usersInformation) == 1){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($usersInformation) > 0){
        include "data.php";
        echo $output;
    }

?>