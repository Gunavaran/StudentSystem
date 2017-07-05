<!DOCTYPE html>

<html>
<head>

    <title> Enter Attendance </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="enter_attendance.php" method="post" name="fixedform">
            Date: <br><br>
            <input type="date" name="date"><br><br>
            Grade:<br><br>
            <input type="text" name="grade"><br><br>
            Division:<br><br>
            <input type="text" name="division"><br><br>
            StudentID:<br><br>
            <input type="text" name="id"><br><br>
            Attendance:<br><br>
            <input type="text" name="attendance"><br><br>

            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';

            if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division']) && isset($_POST['id']) && isset( $_POST['attendance'])){
                if(!empty($_POST['date']) && !empty($_POST['grade']) && !empty($_POST['division']) && !empty($_POST['id']) &&!empty($_POST['attendance'])){

                    $date = $_POST['date'];
                    $grade = $_POST['grade'];
                    $division = $_POST['division'];
                    $id = $_POST['id'];
                    $attendance = $_POST['attendance'];

                    $query = "INSERT INTO attendance (StudentID, Attendance, Date) VALUES ('$id', '$attendance', '$date')";
                    if($query_run = mysqli_query($link, $query)){
                        echo 'Successfully Stored';
                    }else{
                        echo 'Failed!!!';
                    }
                } else {
                    echo 'None of the fields can take an empty value';
                }

            } else {
                echo 'All the required fields should be filled';
            }
            ?>


        </form>
    </div>

    <div id="sidebar">

    </div>

    <footer>
        <h3 class="footer-widget-title">Contact Us</h3>
        <div class="textwidget">
            <p>J/St.John Bosco Vidyalayam,<br/>
                Racca Road, Jaffna.</p>
            <p>Email : stjohnbosco@yahoo.com<br />
                Tel: Principal office: +940212222540</p>
        </div>
        <p align="center" style="font-size: large"><b>All rights reserved</b> </p>
    </footer>

</div>
</body>
</html>

