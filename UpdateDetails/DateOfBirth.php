<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

<html>
<head>

    <title>Update Date Of Birth</title>
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
        <form action="DateOfBirth.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Date Of Birth: <br><br>
            <input type="date" name="dob"><br><br>

            <input type="submit" value="Submit">



            <?php

            include '../Connect/Connect.php';
            $error=0;

            if (isset($_POST['id'])&& isset($_POST['dob'])) {
                if (!empty($_POST['id'])&& !empty($_POST['dob'])) {

                    $today= date_create(date('Y-m-d'));
                    $thisyear=$today->format('Y');
                    $date=($_POST['dob']);
                    $enterYear= date('Y',strtotime($date));

                    if ($_POST['id'] != (string)(int)$_POST['id'] || (int)$_POST['id'] < 0) {
                        $error++;
                        echo "Student ID should be a positive number" . "<br>";
                    } else if ((strlen($_POST['id']) != 6) || (!is_numeric($_POST['id']))) {
                        $error++;
                        echo "Student ID should be in 6 digits</br>";
                    }
                    else if(((int)$thisyear-((int)$enterYear))<5 || (((int)$thisyear-((int)$enterYear))>12)) {
                        $error++;
                        echo "Please enter correct Date of Birth"."<br>";
                    }
                    if ($error==0) {
                        $id = (int)$_POST['id'];


                        $sql_g_d="SELECT DOB FROM student_details WHERE StudentID=$id";
                      //  $quer=mysqli_query($link,$sql_g_d);
                        if(mysqli_query($link,$sql_g_d)) {
                            $error=0;

                        }else{
                            $error++;
                            echo  'Index number does not exist';
                        }
                    }

                    if ($error == 0) {
                        $id = $_POST['id'];
                        $dob = $_POST['dob'];

                        $query = "UPDATE student_details SET DOB=$dob WHERE StudentID=$id";
                        if ($query_run = mysqli_query($link, $query)) {
                            echo 'Date Of Birth of the student changed Successfully!';
                        } else {
                            echo 'Failed!!!';
                        }
                    }
                    } else {
                        echo 'The field cannot take an empty value';
                    }

                } else {
                    echo 'The field should be filled';

            }
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
<?php
} else {
    include '../Log_in_out/loginform.php';
}
