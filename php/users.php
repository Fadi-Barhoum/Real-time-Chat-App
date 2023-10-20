<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $usersInformation = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";
    if (mysqli_num_rows($usersInformation) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($usersInformation) > 0){
        include "data.php";
    }
    echo $output;

?>