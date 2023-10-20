<?php
    include_once "config.php";
    $output = "";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $usersQuery = "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'";
    $usersInformation = mysqli_query($conn, $usersQuery);
    if (mysqli_num_rows($usersInformation) > 0){
        include "data.php";
    }else{
        $output .= "No users found";
    }
    echo $output;
?>