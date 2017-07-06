<!DOCTYPE html>

<html>
<head>

    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

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
        <?php
            echo $content;
        ?>

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