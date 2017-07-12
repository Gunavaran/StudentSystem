<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>
<!DOCTYPE html>

<html>
<head>

    <title> Marks </title>
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
                    <li><a href="TermMarksTemplate.php"> Term Exam Marks </a> </li>
                </ul>
            </nav>
            <?php
            include "../Connect/Connect.php";
            $username = $_SESSION['username'];

            $query = "SELECT Grade FROM student_details WHERE StudentID = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $grade = $query_row['Grade'];

            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link, $query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];

            if (($role == 'student' && $grade ==5) || $role != 'student') {


                ?>
                <nav id="pilot_marks_navigation">
                    <ul id="nav">
                        <li><a href="PilotMarksTemplate.php">Pilot Exam Marks</a></li>

                    </ul>
                </nav>
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

