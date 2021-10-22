<?php
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    //database connection
     $conn = new mysqli('localhost','root','','shuseel');
     if($conn->connect_error){
         die('Connection Failed : '.$conn->connect_error);
     }else{
         $stmt=$conn->prepare("insert into registration(name,email,subject,message) values(?,?,?,?)");
         $stmt->bind_param("ssss", $name, $email, $subject, $message);
         $stmt->execute();
         echo"Message sent successfully";
         $stmt->close();
         $conn->close();
     }
?>