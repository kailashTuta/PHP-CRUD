<?php

if (isset($_POST['register'])) {
    include "DBConnect.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "insert into user(fname,lname,email,username,password)
                values('$fname','$lname','$email','$username','$password')";
    if ($conn->query($query)) {
        echo "Values inserted successfully";
    } else {
        echo "Error in inserting value $conn->error";
    }
}
