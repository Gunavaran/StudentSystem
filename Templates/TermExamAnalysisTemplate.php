<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<!DOCTYPE html>

<html>
<head>

    <title> Term Exam Analysis </title>
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
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <h2 class="heading">Term Analysis Report</h2>
        <form action="../TermExam/TermExamAnalysis.php" method="get" name="fixedform">

            <fieldset>
                Year:
                <input type='text' name='year'><br><br>
                Grade:
                <select name='grade'>
                    <option value = '1'>1</option>
                    <option value = '2'>2</option>
                    <option value = '3'>3</option>
                    <option value = '4'>4</option>
                    <option value = '5'>5</option>
                </select><br><br>
                Term:
                <select name='term'>
                    <option value = 1>I</option>
                    <option value = 2>II</option>
                    <option value = 3>III</option>
                </select><br><br>
                Subject:
                <select name='subject'>
                    <option value = 'all'>All</option>
                    <option value = 'religion_hin'>Religion-Hindu</option>
                    <option value = 'religion_rc'>Religion-RC</option>
                    <option value = 'tamil'>Tamil</option>
                    <option value = 'mathematics'>Mathematics</option>
                    <option value = 'social'>Social</option>
                    <option value = 'english'>English</option>
                </select><br><br>
                Division:
                <select name = 'division'>
                    <option value = 'all'>All</option>
                    <option value = 'A'>A</option>
                    <option value = 'B'>B</option>
                    <option value = 'C'>C</option>
                    <option value = 'D'>D</option>
                    <option value = 'E'>E</option>
                    <option value = 'F'>F</option>
                </select><br><br><br>
                <input type='submit' value='Submit'>
            </fieldset>

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

