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
            <li> <a href="#">Profile</a></li>
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
        <?php
        echo $message;
        ?>

    </div>

    <footer>
        <h3 class="footer-widget-title">Contact Us</h3>
        <div class="textwidget">
            <p>J/St.John Bosco Vidyalayam,<br/>
                Racca Road, Jaffna.</p>
            <p>Email : stjohnbosco@yahoo.com<br />
                Tel: Principal office: +940212222540</p>
        </div>
        <p align="center" style="font-size: large"><b>All rights reserved</b> </p>
    </footer>

</div>
</body>
</html>