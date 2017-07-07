<!DOCTYPE html>

<html>
<head>

    <title> Enter Student Details </title>
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
            <li> <a href="../Templates/TermMarksTemplate.php">TermMarks</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="enter_termmarks.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Subject:<br><br>
            <input type="text" name="subject"><br><br>
            Marks:<br><br>
            <input type="text" name="marks"><br><br>
            Year:<br><br>
            <input type="text" name="year"><br><br>
            Term:<br><br>
            <input type="text" name="term"><br><br>

            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';

            if (isset($_POST['id']) && isset($_POST['subject']) && isset($_POST['marks'])&& isset($_POST['year'])&& isset($_POST['term'])){
                if(!empty($_POST['id']) && !empty($_POST['subject']) && !empty($_POST['marks'])&& !empty($_POST['year'])&& !empty($_POST['term'])){

                    $id = $_POST['id'];
                    $subject = $_POST['subject'];
                    $marks = $_POST['marks'];
                    $year = $_POST['year'];
                    $term = $_POST['term'];

                    $query = "INSERT INTO sdms (StudentID, Subject, Marks, Year, Term ) VALUES ('$id', '$subject', '$marks', '$year', '$term')";
                    if($query_run = mysqli_query($link, $query)){
                        echo 'Successfully Stored';
                    }else{
                        echo 'Failed!!!';
                    }
                } else {
                    echo 'None of the fields can take an empty value';
                }

            } else {
                echo 'All the required fields should be filled';
            }
            ?>


        </form>
    </div>

    <div id="sidebar">

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

