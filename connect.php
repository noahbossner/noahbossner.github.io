<?php
    $connectLink = mysql_connect("localhost", "root", "kjv1611", "nbossner");

    if($connectLink === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    //Creating initial variables
        $fullName = $_POST['fullName'];
        $emailBox = $_POST['email'];
        $relationship = $_POST['relationship'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $dateSent = $_POST['date'];
        $contactTextArea = $_POST['notes'];

        $sql = "INSERT INTO inquires ('fullName', 'email', 'relationship',
        'phoneNumber', 'address', 'date', 'notes') VALUES ($fullName,
        $email, $relationship, $phoneNumber, $address, $date, $notes)";

        if($mysql_query($sql, $connectLink){
          echo "Records have been added to database..."
        }
        else{
          echo "ERROR: Could not execute $sql " . mysqli_error($connectLink)
        }
        $mysql_close($connectLink);
?>
