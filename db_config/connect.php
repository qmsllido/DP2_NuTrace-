<?php
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database connection
    $conn = new mysqli('localhost','root','','register');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(name, contact, email, password)
            values(?, ?, ?, ?)");
        $stmt->bind_param("siss", $name, $contact, $email, $password);
        $stmt->execute();
        echo "Registered Successfully..";
        $stmt->close();
        $conn->close();
    }
?>