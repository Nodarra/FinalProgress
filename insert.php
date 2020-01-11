<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message  = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'mydb');

if(isset($_POST['name']) == true && isset($_POST['email']) == true && isset($_POST['message']) == true){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message  = $_POST['message'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
        if($conn->connect_error){
            die('Conncetion failed: '.$conn->connect_error);
        }else {
            $sql = "INSERT into message(name, email, message) values('$name', '$email', '$message')";
            if($conn->query($sql)){
                echo "Success!";
            } else {
                echo "Error";
            }
            $conn->close();
        }

        header("Location: contact.html");
    exit;
    }else {
        header("Location: contactFailed.html");
    }
}
