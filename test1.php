<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('10','11','12','13','14','15')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('10','11','12','13','14','15')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('10','11','12','13','14','15')");
     
    // commit the transaction
    $conn->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>