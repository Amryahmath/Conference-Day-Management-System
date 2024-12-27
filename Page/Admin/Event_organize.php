    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Console</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../../Style/Admin_Style.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
        </div>



        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#organize" data-toggle="collapse" data-target="#submenu-1"> INFO 🌐 </a>
                </li>
                <li>
                    <a href="#about" data-toggle="collapse" data-target="#submenu-2">  ABOUT 📚 </a>
                </li>
                <li>
                    <a href="#Schedule">  SCHEDULE 🗓️</a>
                </li>
                <li>
                    <a href="#Speakers">SPEAKER 🎤</a>
                </li>
                <li>
                    <a href="#Attendance"> ATTENDING 📝</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
             <section id="organize">
                <div class="row" id="main" >
                    <section id="organize">
                        <div class="detatil">
                            <h1>Event INFO</h1>
                            <div class="content12">
                                <div class="chart">
                                        <h3>Event Set Up </h3>
                                        <?php 
                                            $connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');
                                            if (!$connect) {  
                                                die("Connection failed: " . mysqli_connect_error());
                                            } else {
                                                // Queries to count rows in tables
                                                $QRcount = "SELECT COUNT(*) AS row_count FROM customers_details";
                                                $attanCount = "SELECT COUNT(*) AS row_count FROM attandence";

                                                // Execute queries and fetch row counts
                                                $result1 = $connect->query($QRcount);
                                                $result2 = $connect->query($attanCount);

                                                if ($result1 && $result2) {
                                                    $row1 = $result1->fetch_assoc();
                                                    $row2 = $result2->fetch_assoc();

                                                    // Check if a row already exists in `event_attandedence_detatil`
                                                    $checkQuery = "SELECT * FROM event_attandedence_detatil LIMIT 1";
                                                    $checkResult = $connect->query($checkQuery);

                                                    if ($checkResult->num_rows > 0) {
                                                        // Update existing row without changing `avilable_seet`
                                                        $updateQuery = "
                                                            UPDATE event_attandedence_detatil
                                                            SET qrcunt = '".$row1['row_count']."', attended_seet = '".$row2['row_count']."'
                                                        ";
                                                        if (!mysqli_query($connect, $updateQuery)) {
                                                            echo "Error updating data: " . mysqli_error($connect);
                                                        }
                                                    } else {
                                                        // Insert new row (only if no data exists)
                                                        $insertQuery = "
                                                            INSERT INTO event_attandedence_detatil (qrcunt, attended_seet) 
                                                            VALUES ('".$row1['row_count']."', '".$row2['row_count']."')
                                                        ";
                                                        if (!mysqli_query($connect, $insertQuery)) {
                                                            echo "Error inserting data: " . mysqli_error($connect);
                                                        }
                                                    }

                                                    // Calculate the total number of rows
                                                    $countQuery = "SELECT COUNT(*) AS total_rows FROM event_attandedence_detatil";
                                                    $countResult = $connect->query($countQuery);

                                                    if ($countResult && $countResult->num_rows > 0) {
                                                        $countRow = $countResult->fetch_assoc();
                                                        $totalRows = $countRow['total_rows'];

                                                        // Fetch the last row using LIMIT and OFFSET
                                                        $sql1 = "SELECT * FROM `event_attandedence_detatil` LIMIT 1 OFFSET " . ($totalRows - 1);
                                                        $result5 = $connect->query($sql1);

                                                        if ($result5->num_rows > 0) {
                                                            $row = $result5->fetch_assoc();
                                                            echo '<p>Allocated seats: <samp id="seetCount121">'.htmlspecialchars($row['avilable_seet']).'</samp></p>';
                                                            echo '<p>Total QR Issues: <samp id="seetCount">'.htmlspecialchars($row['qrcunt']).'</samp></p>';
                                                            echo '<p>Current attendance: <samp id="seetCount">'.htmlspecialchars($row['attended_seet']).'</samp></p><br><br><br>';
                                                        } else {
                                                            echo "<p>No data found in event_attandedence_detatil.</p>";
                                                        }
                                                    } else {
                                                        echo "Error fetching row count.";
                                                    }
                                                } else {
                                                    echo "Error executing queries.";
                                                }
                                            }

                                            // Close the database connection
                                            mysqli_close($connect);
                                            ?>



                                        <p>Set for new event</p>
                                        <form action="setseet.php" method="Post">
                                            <label>Add Seating Capacity: </label>
                                            <input type="number" id="initialseets" name="initialseets">
                                            <input type="submit" name="submit" value="save" onclick="setInitialseet()" style="  background-color:rgb(68, 12, 94);">
                                        </form>
                                        <script>
                                            function setInitialseet(){
                                                var totalseet = document.getElementById('initialseets').value;
                                                document.getElementById('seetCount121').innerHTML = totalseet;
                                            }
                                        </script>
                                </div>
                                <div class="attandeandencetable">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Name</th>
                                            <th>Attand time</th>
                                            <th>Email</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            // Database connection
                                            $connect = mysqli_connect('localhost', 'root', '', 'event_managment_db');

                                            // Check database connection
                                            if (!$connect) {
                                                die('Connection failed: ' . mysqli_connect_error());
                                            }

                                            // Correct the SQL query (use backticks instead of single quotes for the table name)
                                            $sql = "SELECT * FROM `attandence`";

                                            // Execute the query
                                            $result = $connect->query($sql);

                                            // Check if there are rows returned
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo ("
                                                        <tr>
                                                            <td>" . htmlspecialchars($row['Name']) . "</td>
                                                            <td>" . htmlspecialchars($row['time-in']) . "</td>
                                                            <td>" . htmlspecialchars($row['Email']) . "</td>
                                                        </tr>
                                                    ");
                                                }
                                            } else {
                                                echo ("<p>No attendance records found.</p>");
                                            }

                                            // Close the database connection
                                            $connect->close();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>      
                        </div>
                </section>
                <section id="about" style="  background-color:rgb(17, 9, 19);">
                    <div class="about_Event" >
                        <div class="buffer"></div>
                        <h2>Add Conference</h2> 
                            <form action="delete.php" method="post"style=" align-items: right;">
                                <button type="submit" style=" align-items: right; background-color:rgb(68, 12, 94);">Reset</button>
                            </form>
                            <form method="post" action="about.php" enctype="multipart/form-data">
                                <label for="bigPara">About the Event:</label></br>
                                <textarea id="bigPara" name="bigPara" rows="6" cols="50"></textarea></br></br>
                                <label>Place</label></br>
                                <input type="text" name="plase" placeholder="Javits Center – 655 West 34th Street, New York, NY 10001"style="width:450px;"></br></br>
                                <label>Date</label></br>
                                <input type="text" name="Date" placeholder="10-13 December, 2018 Monday to Tuesday"style="width:400px;"></br></br></br>
                                <input type="submit" name="submit" value="save" style="display: inline-block; background-color:rgb(68, 12, 94);">
                            </form>
                    </div>
                </section>
                <section id="Schedule" style="  background-color:rgb(14, 9, 9);">
                    <div class="event_form">
                        <h2>Event Schedule</h2>            
        
                            <label> Notice: The event schedule has been officially changed to a five-day format.<br>     Please update your records accordingly.</label>
                            <form action="deletShadul.php" method="post"style=" align-items: right;">
                                <button type="submit" style=" align-items: right;   background-color:rgb(68, 12, 94);">Reset</button>
                            </form>
                                <div class="Day1">    
                                    <form method="post" action="Day/Day1.php" enctype="multipart/form-data">
                                        <h3>Day 1</h3>
                                        <label for="time"> Time:</label>
                                        <input type="text" name="time" required><select name="AM_PM" ><option value="AM">AM</option><option value="PM">PM</option></select>
                                        <label for="Event_title">Event title:</label>
                                        <input type="text" name="Event_title"required>

                                        <label for="Speker_name">Speaker Name:</label>
                                        <input type="text" name="Speker_name"required>
                                        <input type="submit" name="submit" value="save" style="  background-color:rgb(68, 12, 94);">
                                    </form>
                                </div>
                                <div class="Day2">
                                    <form method="post" action="Day/Day2.php" enctype="multipart/form-data">
                                        <h3>Day 2</h3>
                                        <label for="time"> Time:</label>
                                        <input type="text" name="time"><select ><option value="AM">AM</option><option value="PM">PM</option></select>
                                        <label for="Event_title">Event title:</label>
                                        <input type="text" name="Event title">

                                        <label for="Speker_name">Speaker Name:</label>
                                        <input type="text" name="position">
                                        <input type="submit" name="submit" value="save" style="  background-color:rgb(68, 12, 94);">
                                    </form>
                                </div>
                                <div class="Day3">
                                    <form method="post" action="Day/Day3.php" enctype="multipart/form-data">
                                        <h3>Day 3</h3>
                                        <label for="time"> Time:</label>
                                        <input type="text" name="time"><select ><option value="AM">AM</option><option value="PM">PM</option></select>
                                        <label for="Event_title">Event title:</label>
                                        <input type="text" name="Event title">

                                        <label for="Speker_name">Speaker Name:</label>
                                        <input type="text" name="position">
                                        <input type="submit" name="submit" value="save" style="  background-color:rgb(68, 12, 94);">
                                    </form>

                                </div>
                                <div class="Day4">
                                    <form method="post" action="Day/Day4.php" enctype="multipart/form-data">
                                        <h3>Day 4</h3>
                                        <label for="time"> Time:</label>
                                        <input type="text" name="time"><select ><option value="AM">AM</option><option value="PM">PM</option></select>
                                        <label for="Event_title">Event title:</label>
                                        <input type="text" name="Event title">

                                        <label for="Speker_name">Speaker Name:</label>
                                        <input type="text" name="position">
                                        <input type="submit" name="submit" value="save" style="  background-color:rgb(68, 12, 94);">
                                    </form>

                                </div>
                                <div class="Day5">
                                    <form method="post" action="evrnt_organize_form.php" enctype="multipart/form-data">
                                        <h3>Day 5</h3>
                                        <label for="time"> Time:</label>
                                        <input type="text" name="time"><select ><option value="AM">AM</option><option value="PM">PM</option></select>
                                        <label for="Event_title">Event title:</label>
                                        <input type="text" name="Event_title">

                                        <label for="Speker_name">Speaker Name:</label>
                                        <input type="text" name="position">
                                        <input type="submit" name="submit" value="save" style="  background-color:rgb(68, 12, 94);">
                                    </form>

                                </div>
                     </div>    
                </section>
                <section id="Speakers" style="  background-color:rgb(10, 10, 10);">
                    <div class="speeker_update">
                        <div class="head">
                            <h2>Speakers</h2>  
                        </div>
                        <div class="buffer" ></div>
                            <form action="deletspeeker.php" method="post"style=" align-items: right;">
                                <button type="submit" style=" align-items: right;   background-color:rgb(68, 12, 94);">Reset</button>
                            </form> </br>  </br>       
                            <form method="post" action="Event_organize.php" enctype="multipart/form-data"> 
                                    <label for="Name">Name of the Speaker:</label>
                                    <input type="text" name="Name"></br></br>

                                    <label for="speekerImage">Uplod profile photo</label></br></br>
                                    <input type="file" name="speekerImage"></br></br>

                                    <label for="position">Speaker position:</label>
                                    <input type="text" name="position">
                                    <input type="submit" name="submit" value="save" style="  background-color:rgb(68, 12, 94);">
                            </form> 
                    </div>  
                </section> 
                <section id="Attendance"> 
                    <div class="detatil">
                        <Center>
                        <h1>Mark attendance</h1><!-- this section get from internet--></Center>
                        <form id="attandence" method="post" action="attandendence.php">
                            <div id="data"></div>
                            <button type="submit" onclick=""> ok</button>
                        </form><Center>
                        <div class="container">
                            <div class="section">
                                <div id="my-qr-reader">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buffer" ></div>
                    
                        </Center>
                        
                        <script
                            src="https://unpkg.com/html5-qrcode">
                        </script>

                        <script src="../../Script/scannerscript.js"></script>
                    
                </section>       
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php 
    if (isset($_POST['submit'])) {
        if (isset($_FILES['speekerImage'])) {
            // Validate upload errors
            if ($_FILES['speekerImage']['error'] !== UPLOAD_ERR_OK) {
                echo "File upload error: " . $_FILES['speekerImage']['error'];
                exit();
            }

            // Check for empty tmp_name and validate the image
            if (!empty($_FILES['speekerImage']['tmp_name']) && getimagesize($_FILES['speekerImage']['tmp_name']) !== false) {
                // Collect form inputs
                $name = $_POST['Name'];
                $position = $_POST['position'];
                $img_tmp_path = $_FILES['speekerImage']['tmp_name'];
                $img_name = basename($_FILES['speekerImage']['name']);

                $image_data = file_get_contents($img_tmp_path);

                // Connect to the database
                $connect = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Prepare the SQL query
                $sql = "INSERT INTO `speeker` (Name, IMG_NAME, Images, Position) VALUES (?, ?, ?, ?)";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("ssss", $name, $img_name, $image_data, $position);

                if ($stmt->execute()) {
                    echo "Image and data stored successfully.";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                mysqli_close($connect);
            } else {
                echo "Please upload a valid image file.";
            }
        } else {
            echo "No file uploaded. Please try again.";
        }
    }
    
    

?>  
  

</body>
</html>