<?php
session_start();
?>
<html>
<head>

    <title> Pilot Exam </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
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
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="ProfileTemplate.php">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <div id="content_area">
            <nav id="term_marks_navigation">
                <ul id="nav">
                    <li><a href="PilotExamReportTemplate.php"> Pilot Exam Report </a> </li>
                </ul>
            </nav>
            <?php
            include '../Connect/Connect.php';
            $username = $_SESSION['username'];
            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student') {
                ?>
                <nav id="pilot_marks_navigation">
                    <ul id="nav">
                        <li><a href="PilotExamAnalysisTemplate.php">Pilot Exam Analysis</a></li>
                    </ul>
                </nav>
                <?php
            }
            if ($role == 'principal' OR $role=='teacher') {
                ?>
                <nav id="pilot_marks_navigation">
                    <ul id="nav">
                        <li><a href="PilotAddMarksTemplate.php">Enter Pilot Marks</a></li>
                    </ul>
                </nav>
                <?php
            }
            ?>
        </div>
    </div>

    <div id="sidebar">
        <nav id="competition">
            <ul id="nav">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-bottom: 0px"> <a href="../compDetail.php">Competition Details</a></li>
            </ul>
        </nav>

        <nav id="competition" style="margin-top: 0px; padding-top: 0px">
            <ul id="nav" style="margin-top: 0px">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 20px"> <a href="../Calendar.php">School Calendar</a></li>
            </ul>
        </nav>

        <?php
        $username = $_SESSION['username'];

        if ($username == 'principal'){
            ?>

            <nav id="competition" style="margin-top: 0px; padding-top: 0px">
                <ul id="nav" style="margin-top: 0px">
                    <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 45px"> <a href="../User/addStaff.php">Add Staff</a></li>
                </ul>
            </nav>

            <?php
        }
        ?>


    </div>
    <?php
    include '../Styles/FooterStyle.html';
    ?>

</div>
</body>
</html>