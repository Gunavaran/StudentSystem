<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<!DOCTYPE html>

<html>
<head>

    <title> <?php echo $title; ?> </title>
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
        <form action="PilotExamAnalysisTemplate.php" method="post" name = "fixedform">

            <fieldset>
                Year: <br>
                <input type='text' name='year'><br>
                SerialNo: <br>
                <input type='text' name='serialno'><br>
                Division: <br>
                <select name = 'division'>
                    <option value = 'all'>All</option>
                    <option value = 'A'>A</option>
                    <option value = 'B'>B</option>
                    <option value = 'C'>C</option>
                    <option value = 'D'>D</option>
                    <option value = 'E'>E</option>
                    <option value = 'F'>F</option>
                </select><br><br>
                <input type='submit' value='Submit'>
            </fieldset>
        </form>
        <?php
            include '../PilotExam/PilotAnalysis.php';

        ?>
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
