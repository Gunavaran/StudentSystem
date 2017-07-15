<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>
    <!DOCTYPE html>

    <html>
    <head>

        <title>Enter Attendance</title>
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
                <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
                <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
                <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
                <li> <a href="../Log_in_out/logout.php">Logout</a></li>
            </ul>
        </nav>

        <div id="content_area">
            <h2 class="heading">Enter Date, Grade and Division</h2>
            <form action="../Attendance/enter_attendance0.php" method="post" name="fixedform">
                <fieldset>
                    Date: <br>
                    <input type="date" name="date" placeholder="Date"><br><br>
                    Grade: <br>
                    <select name = 'grade'>
                        <option value = '1'>1</option>
                        <option value = '2'>2</option>
                        <option value = '3'>3</option>
                        <option value = '4'>4</option>
                        <option value = '5'>5</option>
                    </select><br><br>
                    Division: <br>
                    <select name = 'division'>
                        <option value = 'A'>A</option>
                        <option value = 'B'>B</option>
                        <option value = 'C'>C</option>
                        <option value = 'D'>D</option>
                        <option value = 'E'>E</option>
                        <option value = 'F'>F</option>
                    </select><br><br>
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
   <?php
} else {
    include '../Log_in_out/loginform.php';
}

