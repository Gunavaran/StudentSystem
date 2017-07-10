<html>
<head>

    <title> Update Attendance </title>
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
        <h2>Enter Attendance To Be Altered</h2>
        <form action="updateattendance.php" method="post" name="fixedform">
            Date: <br><br>
            <input type="date" name="date"><br><br>
            Grade:<br><br>
            <input type="text" name="grade"><br><br>
            Division:<br><br>
            <input type="text" name="division"><br><br>
            StudentID:<br><br>
            <input type="text" name="id"><br><br>
            <input type="submit" value="Submit">

        </form>

        <?php
        include '../Connect/Connect.php';

        if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division']) && isset($_POST['id'])){
            if(!empty($_POST['date']) && !empty($_POST['grade']) && !empty($_POST['division']) && !empty($_POST['id'])){

                $date = $_POST['date'];
                $grade = $_POST['grade'];
                $division = $_POST['division'];
                $id = $_POST['id'];

                $query_attendance = "SELECT Attendance FROM attendance WHERE StudentID = '$id' AND Date = '$date'";
                $query_attendance_run = mysqli_query($link,$query_attendance);
                $query_row = mysqli_fetch_assoc($query_attendance_run);
                $attendance = $query_row['Attendance'];
                if(strtoupper($attendance) == 'A'){
                    $new_value = 'P';
                } else {
                    $new_value = 'A';
                }
                $query = "UPDATE attendance SET Attendance = '$new_value' WHERE StudentID = '$id' AND Date = '$date'";
                if($query_run = mysqli_query($link, $query)){
                    $message='Update Successful';
                } else {
                    $message= 'Update Failed!!!';
                }

            } else {
                $message = 'None of the fields can take an empty value';
            }

        } else {
            $message =  'All the required fields should be filled';
        }

        ?>

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