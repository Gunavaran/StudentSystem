<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

    <html>
    <head>

        <title> Add Competition details </title>
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
            <h2 class="heading">Add Competition Details</h2>
            <form action="../CompDetail/addCompDetail.php" method="get" name="fixedform">
                Grade:
                <select name="grade">
                    <!--<option value="NULL">----</option>-->
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <br>
                Term:
                <select name="term">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <br>
                <br>
                Competition:<br>
                <input type="text" name="competition"><br><br>

                <input type='submit' value='Submit'>

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
