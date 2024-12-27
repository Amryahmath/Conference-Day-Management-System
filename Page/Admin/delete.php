<?php


$connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL DELETE query
$sql = "DELETE FROM `about` ";

// Execute the query
if (mysqli_query($connect, $sql)) {
    echo "<script>alert('Record deleted successfully!');location.replace('Event_organize.php');</script>";
} else {
    echo "Error deleting record: " . mysqli_error($connect);
}

// Close the connection
mysqli_close($connect);
?>