<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

    <html>
    <head>

        <title> Events </title>
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
            <h2 class="heading">Enter Character Details</h2>
            <form action="../Details/AddCharacter.php" method="get" name="fixedform">

                <fieldset>
                    Student ID: <br>
                    <input type="text" name="id" ><br><br>
                    Character Detail:<br>
                    <input type="text" name="character"><br><br>

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

