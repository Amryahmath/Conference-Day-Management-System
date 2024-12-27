<?php
    $seets = $_POST['initialseets'];

    $connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');
    
    $sql = "INSERT INTO event_attandedence_detatil(avilable_seet) VALUES(' $seets')";
    
    // Corrected the function name to `mysqli_query`
    $w = mysqli_query($connect, $sql);
    
    if ($w ) {
        echo "<script> alert('Saved successfully!');location.replace('Event_organize.php');</script>";
    } else {
        echo "Error executing query: " . mysqli_error($connect);}




?>