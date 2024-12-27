<?php
    

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Conferance Event</title>
    <link href="Style/Stylesheet1.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@js-temporal/polyfill/dist/index.umd.js"></script>
    <script src="Script/Script1.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    <!-- 666666666-->

    <header>
        <a href="index.php" class="logo"><div  id="E" style="color:rgb(132, 21, 167);display:inline-block">C</div>onference <div  id="E" style="color:rgb(132, 21, 167);display:inline-block">D</div>ay <div  id="E" style="color:rgb(132, 21, 167);display:inline-block">M</div>anagement</a>
        <nav>
            
            <a href="#about" >ABOUT</a>
            <a href="#services">SCHEDULE </a>
            <a href="#portfolio">SPEAKERS</a>
            <a href="#contact" class="active">BUY TICKET</a>
        </nav>
    </header>


    <!--content about -->
    <!-- section 1-->  
    <center>
        <div class="content_about">
            <!-- corrant date and time -->
            <div id="date"></div><br/>
            <!-- thort about conferance meating-->
            <div class="thort">
                <h1>Join the International Research Conference</h1>
                <h3>where experts unite, innovations thrive, and the future of learning is shaped.</h3>
            </div>
        </div>
    

    <!-- image page -->
    <!-- section 2-->
    <div class="image-box" >
        <!--<img src="image/conferance_blu_hall.jpg" class="img-fluid1" >
        <img src="image/conferance_blu_hall.jpg" alt="Description of Image">-->
    </div>

 
    <!-- about the event -->
    <!-- section 3-->
    <section id="about">
        <div class="about_section">
            <div class="leftside_set">
                <h1>About The Event </h1>
                <?php 
                    // Data base conecton
                    $con = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                    if (!$con) {
                        die('Connection failed:'. mysqli_connect_error());
                    }
                    $sql = 'SELECT * FROM `about`';
                    $result1 = $con->query($sql);

                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                        echo '
                                <p>'. htmlspecialchars($row['about']) .' </p>
                                <div class="where">
                                    <h2>Where</h2>
                                    <p>'. htmlspecialchars($row['plase']) .'</p>
                                </div>
                                <div class="when">
                                    <h2>When</h2>
                                    <p>'. htmlspecialchars($row['Date']) .'</p>
                                </div>  
                        ';
                        }
                    } else {
                        echo '<p>Empty</p>';
                    }
                    // Close the database connection
                    $con->close();
                ?>
            </div>
            <div class="rightside_set">
                <div class="about2">
                    <button type="button" class="btnbtn-primary" onclick="registerForm()">
                        BUY TICKET 
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- Event Schedule saction-->
    <!-- section 4-->
    <section id="services">
        <div class="event_sedul">
            <h1>Event Schedule</h1>
            <div class="event_table">

                <!-- table 1 -->
                <table class="table caption-top" style="  width: 300px; background-color:#FFFAFA">
                    
                            <?php 
                            //  database connection                    
                            $con = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql1 = 'SELECT * FROM `Day1`';
                           
                            $result1 = $con->query($sql1);

                            if ($result1->num_rows > 0) {
                                echo '<thead>
                                        <tr>
                                            <th scope="col" style=" background-color:#FFFAFA" >
                                                <div class="card mb-3" style="width: 14rem; align-items: center; background-color:#FFFAFA">
                                                    <div class="card-body">
                                                    <h5 class="card-title">DAY 1</h5>
                                                    <p class="card-text"></p>
                                                    </div>
                                                </div>
                                        </tr>
                                    </thead>
                                    <tbody> ';
                                while ($row = $result1->fetch_assoc()) {
                                echo '  
                                            <th scope="row"style="align-items: center; background-color:#FFFAFA">
                                                <div class="card mb-3" style="width: 14rem; align-items: center; background-color:#FFFAFA">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'. htmlspecialchars($row['Time']) .' '. htmlspecialchars($row['AMPM']) .'</h5>
                                                        <p class="card-text">'. htmlspecialchars($row['Tittle']) .'</p>
                                                        <p class="speeker">Speaker: '. htmlspecialchars($row['speekerName']) .'</p>   
                                                    </div>
                                                </div> 
                                            </th>';
                                }
                            } else {
                                echo '';
                            }
                            // Close the database connection
                            $con->close();
                            ?> 
                        </tbody>     
                    </table>
                        <!-- table 2 -->
                        <table class="table caption-top" style=" background-color:#FFFAFA">
                            
                            <?php 
                            //  database connection                    
                            $con = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql1 = 'SELECT * FROM `Day2`';
                           
                            $result1 = $con->query($sql1);

                            if ($result1->num_rows > 0) {
                                echo '<thead>
                                        <tr>
                                            <th scope="col" style=" background-color:#FFFAFA" >
                                                <div class="card mb-3" style="width: 14rem; align-items: center; background-color:#FFFAFA">
                                                    <div class="card-body">
                                                    <h5 class="card-title">DAY 2</h5>
                                                    <p class="card-text"></p>
                                                    </div>
                                                </div>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                while ($row = $result1->fetch_assoc()) {
                                echo '  
                                            <th scope="row"style="align-items: center; background-color:#FFFAFA">
                                                <div class="card mb-3" style="width: 15rem; align-items: center; background-color:#FFFAFA">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'. htmlspecialchars($row['Time']) .' '. htmlspecialchars($row['AMPM']) .'</h5>
                                                        <p class="card-text">'. htmlspecialchars($row['Tittle']) .'</p>
                                                        <p class="speeker">Speaker: '. htmlspecialchars($row['speekerName']) .'</p>   
                                                    </div>
                                                </div> 
                                            </th> 
                                        ';
                                }
                            } else {
                                echo '';
                            }
                            // Close the database connection
                            $con->close();
                            ?> 
                        </tbody>  
                    </table>
                    
                    <!-- table 3-->
                    <table class="table caption-top" style="  width: 300px; background-color:#FFFAFA">
                     
                            <?php 
                            //  database connection                    
                            $con = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                            if (!$con) {
                                die("Connection failed: ". mysqli_connect_error());
                            }
                            $sql1 = 'SELECT * FROM `Day3`';
                           
                            $result1 = $con->query($sql1);

                            if ($result1->num_rows > 0) {
                                echo '<thead>
                                            <tr>
                                                <th scope="col" style=" background-color:#FFFAFA" >
                                                    <div class="card mb-3" style="width: 14rem; align-items: center; background-color:#FFFAFA">
                                                        <div class="card-body">
                                                        <h5 class="card-title">DAY 3</h5>
                                                        <p class="card-text"></p>
                                                        </div>
                                                    </div>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                while ($row = $result1->fetch_assoc()) {
                                echo '  

                                        
                                            <th scope="row"style="align-items: center; background-color:#FFFAFA">
                                                <div class="card mb-3" style="width: 15rem; align-items: center; background-color:#FFFAFA">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'. htmlspecialchars($row['Time']) .' '. htmlspecialchars($row['AMPM']) .'</h5>
                                                        <p class="card-text">'. htmlspecialchars($row['Tittle']) .'</p>
                                                        <p class="speeker">Speaker: '. htmlspecialchars($row['speekerName']) .'</p>   
                                                    </div>
                                                </div> 
                                            </th>
                                         
                                        ';
                                }
                            } else {
                                echo '';
                            }
                            // Close the database connection
                            $con->close();
                            ?> 
                        </tbody>    
                    </table>

                    <!-- table 4-->
                    <table class="table caption-top" style="  width: 300px; background-color:#FFFAFA">
                     
                            <?php 
                            //  database connection                    
                            $con = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql1 = 'SELECT * FROM `Day4`';
                           
                            $result1 = $con->query($sql1);

                            if ($result1->num_rows > 0) {
                                echo '<thead>
                                            <tr>
                                                <th scope="col" style=" background-color:#FFFAFA" >
                                                    <div class="card mb-3" style="width: 14rem; align-items: center; background-color:#FFFAFA">
                                                        <div class="card-body">
                                                        <h5 class="card-title">DAY 4</h5>
                                                        <p class="card-text"></p>
                                                        </div>
                                                    </div>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                while ($row = $result1->fetch_assoc()) {
                                echo ' 
                                         
                                                <th scope="row"style="align-items: center; background-color:#FFFAFA">
                                                <div class="card mb-3" style="width: 15rem; align-items: center; background-color:#FFFAFA">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'. htmlspecialchars($row['Time']) .' '. htmlspecialchars($row['AMPM']) .'</h5>
                                                        <p class="card-text">'. htmlspecialchars($row['Tittle']) .'</p>
                                                        <p class="speeker">Speaker: '. htmlspecialchars($row['speekerName']) .'</p>   
                                                    </div>
                                                </div> 
                                            </th>
                                          
                                        ';
                                }
                            } else {
                                echo '';
                            }
                            // Close the database connection
                            $con->close();
                            ?> 
                        </tbody>   
                    </table>


                
                </div>
            </div>
        </section>


        <!--Speekers -->
        <!-- section 5-->
            <section id="portfolio">
                <div class="speekers">
                    <h1>Our Speakers</h1>
                    <?php 
                    //  database connection                    

                    $con = mysqli_connect('localhost', 'root', '', 'event_managment_DB');
                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                
                    $sql = 'SELECT * FROM `speeker`';
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                
                        while ($row = $result->fetch_assoc()) {
                            $imageData = base64_encode($row['Images']); 
                            
                            echo '
                            <div class="card2 " style="background-image: url(data:image/jpeg;base64,' . $imageData . ') ;  background-size: 100% 100%;filter: brightness(100%);">
                                
                                    <h4 class="card-title" style="margin-top: 60%; text-align: center;color: #39a7d6;">' . htmlspecialchars($row['Name']) . '</h4>
                                    <p class="card-text" style="margin-top: 4%; text-align: center;color:rgb(0, 0, 0);">' . htmlspecialchars($row['Position']) . '</p>
                                
                            </div>
                            ';
                        }
                    } else {
                        echo '<p>No Speakers Found</p>';
                    }

                    // Close the database connection
                    $con->close();
                    ?>
            </div>
        </section>

                </center>

    <!-- tiket senter-->
    <!--section 6 -->
    <section id="contact">
        <div class="tiket">
            <p id="pera1" style="color:rgb(240, 242, 243);">Our Unwavering Crew</p>
            <h2>Secure Your Ticket Today!</h2>
            <p id="pera2">Last year, tickets sold out fast—don't miss your chance to be part of this exciting event. Join us and experience innovative sessions, expert speakers, and impactful discussions. Get your ticket now and ensure your place at the conference!</p>
            <button type="button" class="btnbtn-primary"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; margin-left: 47%; margin-top: 25px;" onclick="registerForm()">
                BUY TICKET 
            </button>
        </div>
<center>


        <section class="contact" id="contact">
        <h2 class="heading">FEED <span>BACK</span></h2>
 <form id="contactForm">
            <div class="input-group">
                <div class="input-box">
                    <input type="text" id="fullName" placeholder="Full name" required>
                    <input type="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <input type="tel" id="phoneNumber" placeholder="Phone Number" required>
                    <input type="text" id="subject" placeholder="Subject" required>
                </div>
            </div>
            <div class="input-group-2">
                <textarea id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <input type="submit" value="Send Message" class="btn">
            </div>
        </form>
    </section>
        
        <p ><a href="Page/Admin/loging.html" class="organize_event" target="_blank">Admin</a></p>
    </section>
   
    <footer class="footer">
        <div class="social">
            <a href="https://www.linkedin.com/in/amry-ahmath/"><i class='bx bxl-linkedin'></i></a>
            <a href="https://github.com/Amryahmath"><i class='bx bxl-github'></i></a>
            <a href="https://www.instagram.com/mm_amry/"><i class='bx bxl-instagram'></i></a>
            
        </div>
        <p class="copyright">
            © Amry Ahmath | All Rights Reserved
        </p>
        </center>
</body>
                
</html>



