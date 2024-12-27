<!--chak the customer is register or not  -->
<!-- get data from scannerscript.js file -->



<?php
// Check if dataArray is received from POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dataArray'])) {
        // Decode the array from JSON format
        $dataArray = json_decode($_POST['dataArray'], true);

        // Check if JSON is valid
        if (json_last_error() === JSON_ERROR_NONE) {
            // Split data array (for example, name, phone, email, address)
            $name = $dataArray[0];
            $phone = $dataArray[1];
            $email = $dataArray[2];
            $address = $dataArray[3];

            // Connect to the database
            $connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');

            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if data exists in the database
            $sql = "SELECT * FROM your_table WHERE name = '$name' AND phone = '$phone' AND email = '$email' AND address = '$address'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "Data exists in the database.";
            } else {
                echo "No matching data found.";
            }

            // Close connection
            mysqli_close($connect);
        } else {
            echo "Invalid JSON data.";
        }
    } else {
        echo "No data received.";
    }
} else {
    echo "Request method is not POST.";
}
?>
