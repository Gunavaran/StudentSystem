<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<html>
<head>
    <title> Get Term Exam Report</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>

    <style>
        select{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
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
        <h2>Enter the following details to obtain Report</h2>
        <form action="../TermExam/termReport.php" method="get" name="fixedform">
            <?php
            include '../Connect/Connect.php';
            $username='150196'; //$_SESSION['username'];
            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student') {?>
                IndexNo:<br>
                <input type='text' name='indexno' >
                <br>
            <?php } ?>
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


    <?php
} else {
    include '../Log_in_out/loginform.php';
}
