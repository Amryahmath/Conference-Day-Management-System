<?php
$Time = $_POST['time'];
$AM_PM = $_POST['AM_PM'];
$Title = $_POST['Event_title'];
$Speeker_name = $_POST['Speker_name'];


// Corrected the function name to `mysqli_connect`
$connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');

$sql = "INSERT INTO Day5(Time,AMPM,Tittle,speekerName) VALUES('$Time', '$AM_PM', '$Title', '$Speeker_name')";

// Corrected the function name to `mysqli_query`
$w = mysqli_query($connect, $sql);

if ($w ) {
    echo "<script> alert('Saved successfully!');location.replace('../Event_organize.php');</script>";
} else {
    echo "Error executing query: " . mysqli_error($connect);
}

?>
