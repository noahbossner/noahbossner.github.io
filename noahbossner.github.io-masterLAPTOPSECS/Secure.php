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

    $servername = "localhost";
    $username = "nbossner";
    $password = "uD9Ahgh7ai";
    $dbname = "nbossner";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully (".$conn->host_info.")";
    echo "<br>";

    $thisPHP = $_SERVER['PHP_SELF'];

    if (isset($_POST["btnDelete"]))
      {
       $ID = $_POST['ID'];
       $sql = "delete from Secure where id = '$ID'";

       if ($conn->query($sql) == TRUE) {
           echo "DEBUG: Record deleted <br>";
         }
      }
    $sql = "SELECT * FROM `inquires` LIMIT 0, 30 ";
    $result = $conn->query($sql);


    if ($result->num_rows > 0)
    {
        echo "<table>";
        echo "<tr> <td>ID</td>  <td>Name </td> <td>E-Mail</td>  <td>Relation</td>   <td>Phone</td>   <td>Address</td>  <td>Date</td>   <td>Notes</td>  <td> Delete? </td></tr>";
        while($row = $result->fetch_assoc()){
                echo "<tr>";
                $ID = $row["ID"];
                echo "<td>"."ID".
                  //" </td> <td> " . $row["ID"]
                  " </td> <td> " . $row["fullName"] .
                  " </td> <td> " . $row["email"] .
                  " </td> <td> " . $row["relationship"] .
                  " </td> <td> " . $row["phoneNumber"] .
                  " </td> <td> " . $row["address"] .
                  " </td> <td> " . $row["date"] .
                  " </td> <td> " . $row["notes"] .
                  "</td> <td>";

                  echo "<form action='{$thisPHP}' method='post' style='display:inline' >";
                  echo "<input type='hidden' name='ID' value='{$ID}'>";
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
