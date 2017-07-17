<?php
include "../Log_in_out/core.php";
if (logged_in()) {

    ?>
    <html>
    <head>

        <title> Attendance </title>
        <link rel="stylesheet" type="text/css" href="../Styles/stylesheets.css"/>
        <style>
            nav[id=competition] {
                background-color: mediumorchid;
                height: 60px;
                border-radius: 5px;
                margin-top: 10px;
            }
            div [id = resultbar]{
                float: left;
                width: 40%;
                margin: 20px 10px 0px 300px;
                padding: 10px;
                border: 2px solid #E3E3E3;
                border-radius: 5px;
                font-family: "Adobe Gothic Std B";
                background-color: #E3E3E3;
            }
        </style>

    </head>
    <body>
    <div id="wrapper">
        <div id="banner"></div>

        <nav id="navigation">
            <ul id="nav">
                <li><a href="index.php"> Home </a></li>
                <li><a href="../Templates/ProfileTemplate.php">Profile</a></li>
                <li><a href="../Templates/MarksTemplate.php">Marks</a></li>
                <li><a href="../Templates/attendancetemplate.php">Attendance</a></li>
                <li><a href="../Log_in_out/logout.php">Logout</a></li>
            </ul>
        </nav>

        <div id="content_area">
            <div id="content_area">
                <?php
                include '../Connect/Connect.php';
                $username = $_SESSION['username'];
                $query = "SELECT Role FROM users WHERE username = '$username'";
                $query_run = mysqli_query($link, $query);
                $query_row = mysqli_fetch_assoc($query_run);
                $role = $query_row['Role'];
                if ($role != 'student') {
                    ?>
                    <nav id="term_marks_navigation">
                        <ul id="nav">
                            <li><a href="EnterAttendanceTemplate.php"> Enter Attendance </a></li>
                        </ul>
                    </nav>
                    <nav id="pilot_marks_navigation">
                        <ul id="nav">
                            <li><a href="../Attendance/updateattendance.php">Update Attendance</a></li>
                        </ul>
                    </nav>
                    <?php
                } else {
                    $attendance_query = "SELECT Attendance, Date FROM attendance WHERE StudentID = '$username'";
                    $attendance_query_run = mysqli_query($link, $attendance_query);
                    ?>
                    <div id="resultbar">
                        <?php
                        echo 'You are absent on: <br/>';
                        $count = 0;
                        while ($attendance_row = mysqli_fetch_assoc($attendance_query_run)) {
                            $attendance = $attendance_row['Attendance'];
                            $date = $attendance_row['Date'];
                            if (strtoupper($attendance) == 'A') {
                                echo $date . '<br/>';
                                $count++;
                            }
                        }
                        if ($count == 0) {
                            echo 'You are always present. Keep it up!!!';
                        }
                        ?>
                    </div>
                    <?php

                }
                ?>


            </div>
        </div>

        <?php
        include '../Styles/SidebarStyle.html';
        include '../Styles/FooterStyle.html';
        ?>
    </div>
    </body>
    </html>

    <?php
} else {
    include '../Log_in_out/loginform.php';
}
