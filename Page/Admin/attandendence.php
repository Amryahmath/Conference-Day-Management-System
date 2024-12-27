<?php
date_default_timezone_set("Asia/Colombo"); 
$name = $_COOKIE['data1'];
$phone = $_COOKIE['data2'];
$email = $_COOKIE['data3'];
$address = $_COOKIE['data4'];
$currantTime  = date("H:i:s"); 
$crrentdate = date("y-m-d ");

$connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to check if email exists for a given name
$sql1 = "SELECT `Email` FROM `customers_details` WHERE `Name` = ?";
$sql2 = "SELECT `Date` FROM `about`;";
$sql3 = "INSERT INTO `attandence`(`Name`, `time-in`, `Email`) VALUES(?, ?, ?)";

// Prepare and execute the first query to fetch email based on name
$stmt1 = mysqli_prepare($connect, $sql1);
mysqli_stmt_bind_param($stmt1, "s", $name);
mysqli_stmt_execute($stmt1);
mysqli_stmt_store_result($stmt1);

// Prepare the second query to fetch the event date (if needed)
$stmt2 = mysqli_prepare($connect, $sql2);

if (mysqli_stmt_num_rows($stmt1) > 0) {
    // Bind and fetch email from the result of the first query
    mysqli_stmt_bind_result($stmt1, $db_email);
    mysqli_stmt_fetch($stmt1);
    
    // If the fetched email doesn't match the provided email
    if ($db_email != $email) {
        // Insert the attendance record using a prepared statement
        $stmt3 = mysqli_prepare($connect, $sql3);
        mysqli_stmt_bind_param($stmt3, "sss", $name, $currantTime, $email);
        
        
        if (mysqli_stmt_execute($stmt3)) {
            echo "<script> alert('Dear "$name", your attandence detail is \n Date: "$crrentdate"\n Time: "$crrentdate"\n Email: "$email"');location.replace('Event_organize.php');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
        mysqli_stmt_close($stmt3);
    }
} else {
    echo "No record found for name: " . $name;
}

mysqli_stmt_close($stmt1);
mysqli_stmt_close($stmt2);
mysqli_close($connect);
?>
