<?php


$connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL DELETE query
$sql1 = "DELETE FROM `day1` ";
$sql2 = "DELETE FROM `day2` ";
$sql3 = "DELETE FROM `day3` ";
$sql4 = "DELETE FROM `day4` ";
$sql5 = "DELETE FROM `day5` ";

// Execute the query
if (mysqli_query($connect, $sql1)) {
    echo "<script>alert('Day1 deleted successfully!');</script>";
    if (mysqli_query($connect, $sql2)) {
        echo "<script>alert('Day2 deleted successfully!');</script>";
        if (mysqli_query($connect, $sql3)) {
            echo "<script>alert('Day2 deleted successfully!');</script>";
            if (mysqli_query($connect, $sql4)) {
                echo "<script>alert('Day2 deleted successfully!');</script>";
                if (mysqli_query($connect, $sql5)) {
                    echo "<script>alert('Day2 deleted successfully!');location.replace('Event_organize.php');</script>";
                }
            }
        }
    }
} else {
    echo "Error deleting record: " . mysqli_error($connect);
}

// Close the connection
mysqli_close($connect);
?>