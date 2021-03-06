<?php

$title = 'Home';
$content = '';

include '../Connect/Connect.php';
require '../Log_in_out/core.php';


if (logged_in()){
    ?>
<!DOCTYPE html>

<html>
<head>

    <title> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
            border-radius: 5px;
            margin-top: 10px;
        }

        div [id = resultbar]{
            float: left;
            width: 100%;
            margin: 10px 0px 0px 10px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: lightskyblue;
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
        <div id = "resultbar">
            <?php
            include "../EventNotify/Event.php";
            include "../Notifications/notifyPoorAttendance.php";
            include "../Notifications/notifyLowMarks.php";
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

$user =  $_SESSION['username'];

} else {
    include '../Log_in_out/loginform.php';
}

