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
                            <li><a href="../Attendance/enter_attendance.php"> Enter Attendance </a></li>
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
                    echo 'You are absent on: <br/>';
                    $count = 0;
                    $days = 0;
                    while ($attendance_row = mysqli_fetch_assoc($attendance_query_run)) {
                        $attendance = $attendance_row['Attendance'];
                        $date = $attendance_row['Date'];
                        $days++;
                        if (strtoupper($attendance) == 'A') {
                            echo $date . '<br/>';
                            $count++;
                        }
                    }
                    $absence = floor(($count * 10000) / ($days * 100));
                    if ($count == 0) {
                        echo 'You are always present. Keep it up!!!';
                    } else if ($absence > 20) {
                        $attendancenoti = "INSERT INTO notify_attendance (StudentID, Absence) VALUES ('$id',$absence)";
                        $attendancenoti_run = mysqli_query($link, $attendancenoti);
                    }

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
