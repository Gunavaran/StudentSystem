<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<!DOCTYPE html>

<html>
<head>

    <title>Update Father's Name</title>
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
            <li> <a href="../Templates/TermMarksTemplate.php">TermMarks</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="FatherJob.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Father's Job: <br><br>
            <input type="text" name="fatherJob"><br><br>

            <input type="submit" value="Submit">



            <?php

            include '../Connect/Connect.php';
            $error=0;

            if (isset($_POST['id'])&& isset($_POST['fatherJob'])) {
                if (!empty($_POST['id'])&& !empty($_POST['fatherJob'])) {
                    if ($_POST['id'] !== (string)(int)$_POST['id'] || (int)$_POST['id'] < 0) {
                        $error++;
                        echo "Student ID should be a positive number" . "<br>";
                    } else if (strlen($_POST['id']) != 6  || (!is_numeric($_POST['id']))) {
                        $error++;
                        echo "Student ID should be in 6 digits</br>";
                    }
                    else if (!ctype_alpha($_POST['fatherJob'])) {
                        $error++;
                        echo "Father's Job should contains only alphaphets" . "<br>";
                    }
                    if ($error==0) {
                        $id = (int)$_GET['id'];
                        $year = $_GET['year'];
                        $subject = $_GET['subject'];
                        $marks = $_GET['marks'];
                        $term = $_GET['term'];

                        $sql_g_d="SELECT FatherJob FROM student_details WHERE StudentID=$id";
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
                        $fatherJob = $_POST['fatherJob'];

                        $query = "UPDATE student_details SET FatherJob=$fatherJob WHERE StudentID=$id";
                        if ($query_run = mysqli_query($link, $query)) {
                            echo "Father's Job of the student changed Successfully!";
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
?>