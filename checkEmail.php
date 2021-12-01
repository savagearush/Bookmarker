<?php

require_once "init.php";

    $email = $_GET['email'];

    $query = "SELECT Email FROM logindb WHERE Email = :email ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('email', $email);
    $stmt->execute();

    $result = $stmt->fetch();

    if($result){
        echo "exist";
    } else{
        echo "unexist";
    }

    
    

    
    
    




?>