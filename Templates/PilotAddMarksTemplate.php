<!DOCTYPE html>

<html>
<head>

    <title>Add Pilot Marks</title>
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
            <li><a href="../Templates/index.php"> Home </a> </li>
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <h2 class="heading">Enter Year and Serial No. to enter pilot marks</h2>
        <form action="../PilotMarks/PilotAddMark_1.php" method="get" name="fixedform">
            <fieldset>
                Year: <br>
                <input type="text" name="year" placeholder="Year"><br><br>
                Serial No: <br>
                <input type="text" name="serial_no" placeholder="Serial No."><br><br>
                <input type="submit" value="Submit">
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

