<?php


    $contactname = htmlspecialchars($_POST['contact-name']);
    $contactemail = htmlspecialchars($_POST['contact-email']); 
    $contactmessage = htmlspecialchars($_POST['contact-message']); 
   
    $db = mysqli_connect ("localhost","root","");
    mysqli_select_db ($db, "orders");
    mysqli_query($db, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($db, "SET CHARACTER SET 'utf8'");
    $result2   = mysqli_query ($db,"INSERT INTO orders (name, email, text,date)  VALUES('$contactname','$contactemail',' $contactmessage',NOW())");

header("Location: ".$_SERVER['HTTP_REFERER']);

?>