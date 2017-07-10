<!DOCTYPE html>

<html>
<head>

    <title> Enter Details </title>
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
        <form action="Enter_details.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            First Name:<br><br>
            <input type="text" name="FirstName"><br><br>
            Last Name:<br><br>
            <input type="text" name="LastName"><br><br>
            Grade:<br><br>
            <input type="text" name="grade"><br><br>
            Division:<br><br>
            <input type="text" name="division"><br><br>
            Address:<br><br>
            <input type="text" name="Address"><br><br>
            Phone:<br><br>
            <input type="text" name="PhoneNumber"><br><br>
            Date Of Birth:<br><br>
            <input type="date" name="DateOfBirth"><br><br>
            Email:<br><br>
            <input type="text" name="Email"><br><br>
            Father's Name:<br><br>
            <input type="text" name="FatherName"><br><br>
            Father's Job:<br><br>
            <input type="text" name="FatherJob"><br><br>
            Mother's Name:<br><br>
            <input type="text" name="MotherName"><br><br>
            Mother's Job:<br><br>
            <input type="text" name="MotherJob"><br><br>
            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';

            if (isset($_POST['id']) && isset($_POST['FirstName']) && isset($_POST['LastName'])&& isset($_POST['Address'])&& isset($_POST['PhoneNumber'])&& isset($_POST['Email'])&& isset($_POST['FatherName'])&& isset($_POST['FatherJob'])&& isset($_POST['MotherJob'])&& isset($_POST['DateOfBirth'])&& isset($_POST['MotherName']) && isset($_POST['grade'])&& isset($_POST['division']) ){
                if(!empty($_POST['id']) && !empty($_POST['FirstName']) && !empty($_POST['LastName'])&& !empty($_POST['Email'])&& !empty($_POST['Address'])&& !empty($_POST['PhoneNumber'])&& !empty($_POST['FatherName'])&& !empty($_POST['FatherJob'])&& !empty($_POST['MotherJob'])&& !empty($_POST['MotherName'])&& !empty($_POST['DateOfBirth'])&& !empty($_POST['grade'])&& !empty($_POST['division'])){

                    $id = $_POST['id'];
                    $first = $_POST['FirstName'];
                    $last = $_POST['LastName'];
                    $add = $_POST['Address'];
                    $mail = $_POST['Email'];
                    $phone = $_POST['PhoneNumber'];
                    $fatherName = $_POST['FatherName'];
                    $fatherJob = $_POST['FatherJob'];
                    $motherName = $_POST['MotherName'];
                    $motherJob = $_POST['MotherJob'];
                    $dob = $_POST['DateOfBirth'];
                    $grade = $_POST['grade'];
                    $division = $_POST['division'];

                    $query = "INSERT INTO student_details (StudentID, FirstName, LastName, Address, Telephone, email, FatherName, FatherJob, MotherName, MotherJob, DOB, Grade, Division ) VALUES ('$id', '$first', '$last', '$add', '$phone','$mail','$fatherName','$fatherJob','$motherName','$motherJob','$dob','$grade','$division')";
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

