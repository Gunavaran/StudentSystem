<!DOCTYPE html>

<html>
<head>

    <title> <?php echo $title; ?> </title>
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
            <li> <a href="ProfileTemplate.php">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="PilotExamReportTemplate.php" method="get" name = "fixedform">
            <fieldset>
                <legend>Choose Index Number</legend>
                IndexNo:<br>
                <input type='text' name='indexno' >
                <br><br>
                <input type='submit' value='Submit'>
            </fieldset>

            <?php
            include '../PilotExam/PilotReport.php';
            ?>
        </form>

    </div>

    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>

</div>
</body>
</html>






