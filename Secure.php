<!doctype html>
<html>
<head>
<style>
    table, td, tr {
        border: 1px black solid;
        padding: 3px 8px 3px 8px;
    }
</style>
</head>

<body>
<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "kjv1611";
    $dbname = "nbossner";
    $conn = new mysqli($servername, $username, $password, $dbname, $notes);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully (".$conn->host_info.")";
    echo "<br>";

    $thisPHP = $_SERVER['PHP_SELF'];
    $sql = "SELECT * FROM inquires";
    $result = $conn->query($sql);


    if ($result->num_rows > 0)
    {
        echo "<table>";
        echo "<tr> <td>Name </td> <td>E-Mail</td>  <td>Relation</td>   <td>Phone</td>   <td>Address</td>  <td>Date</td>   <td>Notes</td>  <td> Delete? </td></tr>";
        while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo " </td> <td> " . $row["fullName"] .
                  " </td> <td> " . $row["email"] .
                  " </td> <td> " . $row["relationship"] .
                  " </td> <td> " . $row["phoneNumber"] .
                  " </td> <td> " . $row["address"] .
                  " </td> <td> " . $row["date"] .
                  " </td> <td> " . $row["notes"] .
                  "</td> <td>";

                echo "<form action='{$thisPHP}' method='post' style='display:inline' >";
                echo "<input type='submit' name='btnDelete' value='Delete'></form>";
                echo "</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "0 results";
    }
    $conn->close();
?>
