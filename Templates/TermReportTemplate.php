<?php
session_start();
?>
<html>
<head>
    <title> Get Term Exam Report</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>
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
        <h2>Enter the following details to obtain Report</h2>
        <form action="../TermExam/termReport.php" method="get" name="fixedform">
            IndexNo:<br>
            <input type='text' name='indexno' >
            <br>
            Year:<br>
            <input type='text' name='year' >
            <br>
            Term:
            <select name="term">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>

</div>
</body>
</html>

