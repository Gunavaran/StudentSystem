<!DOCTYPE html>

<html>
<head>

    <title> Term Exam Analysis </title>
<link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

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
        <form action="../TermExam/TermExamAnalysis.php" method="get">

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

    <div id="sidebar">
        <nav id="competition">
            <ul id="nav">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-bottom: 0px"> <a href="../compDetail.php">Competition Details</a></li>
            </ul>
        </nav>

        <nav id="competition" style="margin-top: 0px; padding-top: 0px">
            <ul id="nav" style="margin-top: 0px">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 20px"> <a href="../Calendar.php">School Calendar</a></li>
            </ul>
        </nav>

        <?php
        session_start();
        $username = $_SESSION['username'];

        if ($username == 'principal'){
            ?>

            <nav id="competition" style="margin-top: 0px; padding-top: 0px">
                <ul id="nav" style="margin-top: 0px">
                    <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 45px"> <a href="../addStaff.php">Add Staff</a></li>
                </ul>
            </nav>

            <?php
        }
        ?>


    </div>

    <footer>
        <div class = 'footer1'>
            <h3 id="h3">Address</h3>
            J/St.John Bosco Vidyalayam,<br/>
            Racca Road, Jaffna.
        </div>
        <div class = 'footer2'>
            <h3 id="h3" >Contact Us</h3>
            Email : stjohnbosco@yahoo.com<br />
            Tel: Principal office: +940212222540
        </div>
        <div class = 'footer3'><i>copyright : Futura Labs</i></div>

    </footer>

</div>
</body>
</html>

