<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>

    <title> Profile Template </title>
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
                    <li><a href="../Details/Enter_details.php"> Enter Details </a> </li>
                </ul>
            </nav>
            <nav id="term_marks_navigation">
                <ul id="nav">
                    <li> <a href="../UpdateDetails/updateDetails.php">Update Details</a></li>

                </ul>
            </nav>
            <nav id="term_marks_navigation">
                <ul id="nav">
                    <li> <a href="ViewDetailTemplate.php">View Details</a></li>

                </ul>
            </nav>
            <nav id="term_marks_navigation">
                <ul id="nav">
                    <li> <a href="CharacterTemplate.php">Character Certificate</a></li>

                </ul>
            </nav>

        </div>
    </div>
    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>
</div>
</body>
</html>