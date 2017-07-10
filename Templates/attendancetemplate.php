<?php
session_start();
?>

<html>
<head>

    <title> Attendance </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="../Templates/index.php"> Home </a> </li>
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <div id="content_area">
            <?php
            include '../Connect/Connect.php';
            $username = $_SESSION['username'];
            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student') {
                ?>
                <nav id="term_marks_navigation">
                    <ul id="nav">
                        <li><a href="../Attendance/enter_attendance.php"> Enter Attendance </a> </li>
                    </ul>
                </nav>
                <nav id="pilot_marks_navigation">
                    <ul id="nav">
                        <li> <a href="../Attendance/updateattendance.php">Update Attendance</a></li>
                    </ul>
                </nav>
                <?php
            } else{
                $attendance_query = "SELECT Attendance, Date FROM attendance WHERE StudentID = '$username'";
                $attendance_query_run = mysqli_query($link, $attendance_query);
                echo 'You are absent on: <br/>';
                $count = 0;
                while($attendance_row = mysqli_fetch_assoc($attendance_query_run)){
                    $attendance = $attendance_row['Attendance'];
                    $date = $attendance_row['Date'];
                    if (strtoupper($attendance)=='A'){
                        echo $date.'<br/>';
                        $count++;
                    }
                }
                if ($count == 0){
                    echo 'You are always present. Keep it up!!!';
                }

            }
            ?>


        </div>
    </div>

    <div id="sidebar">

    </div>

    <footer>
        <div class = 'footer1'>
            <h3 id="h3">Address</h3>
            J/St.John Bosco Vidyalayam,<br/>
            Racca Road, Jaffna.
        </div>
        <div class = 'footer2'>
            <h3 id="h3" >Contact Us</h3>
            Email : stjohnbosco@yahoo.com<br />
            Tel: Principal office: +940212222540
        </div>
        <div class = 'footer3'><i>copyright : Futura Labs</i></div>

    </footer>
</div>
</body>
</html>