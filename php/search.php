<?php
    session_start();
    
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $output = "";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $usersQuery = "SELECT * FROM users WHERE (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') AND  NOT unique_id = {$outgoing_id}";
    $usersInformation = mysqli_query($conn, $usersQuery);
    if (mysqli_num_rows($usersInformation) > 0){
        include "data.php";
    }else{
        $output .= "No users found";
    }
    echo $output;
?>