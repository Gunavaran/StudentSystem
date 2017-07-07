
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
            <li><a href="../Templates/index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="enter_attendance.php" method="post" name="fixedform">
            Date: <br><br>
            <input type="date" name="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>"><br><br>
            Grade:<br><br>
            <input type="text" name="grade" value="<?php if (isset($_POST['grade'])){echo $_POST['grade'];} ?>"><br><br>
            Division:<br><br>
            <input type="text" name="division" value="<?php if (isset($_POST['division'])){echo $_POST['division'];} ?>"><br><br>
            StudentID:<br><br>
            <input type="text" name="id" ><br><br>
            Attendance: Enter 'p' for present and 'a' for absent<br><br>
            <input type="text" name="attendance"><br><br>

            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $message = '';
            if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division']) && isset($_POST['id']) && isset( $_POST['attendance'])){
                if(!empty($_POST['date']) && !empty($_POST['grade']) && !empty($_POST['division']) && !empty($_POST['id']) &&!empty($_POST['attendance'])){
                    $date = $_POST['date'];
                    $grade = $_POST['grade'];
                    $division = strtoupper($_POST['division']);
                    $id = $_POST['id'];
                    $id2 = $id * 1;
                    $attendance = strtoupper($_POST['attendance']);
                    if($attendance != 'A' && $attendance != 'P') {
                        $message = 'Attendance can take values p/P or a/A only';
                    } else if(strlen($id) != 6){
                        $message = "Length of StudentID should be 6";
                    }else if(!is_numeric($id)){
                        $message = "StudentID can only be numbers";
                    } else if (!is_int($id2)) {
                        $message = 'StudentID can only be integer values';
                    } else {
                        $query = "INSERT INTO attendance (StudentID, Attendance, Date) VALUES ('$id', '$attendance', '$date')";
                        if($query_run = mysqli_query($link, $query)){
                            $message = 'Successfully Stored';
                        }else{
                            $message = 'Failed!!!';
                        }
                    }

                } else {
                    $message = 'None of the fields can take an empty value';
                }

            } else {
                $message = 'All the required fields should be filled';
            }

            echo $message;
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

