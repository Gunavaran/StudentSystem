<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<!DOCTYPE html>

<html>
<head>

    <title>Update Father's Job</title>
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
        <form action="FatherName.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Father's Name: <br><br>
            <input type="text" name="fatherName"><br><br>

            <input type="submit" value="Submit">



            <?php

            include '../Connect/Connect.php';
            $error=0;

            if (isset($_POST['id'])&& isset($_POST['fatherName'])) {
                if (!empty($_POST['id'])&& !empty($_POST['fatherName'])) {
                    if ($_POST['id'] !== (string)(int)$_POST['id'] AND (int)$_POST['id'] > 0) {
                        $error++;
                        echo "Student ID should be a positive number" . "<br>";
                    } else if (strlen($_POST['id']) != 6  && (!is_numeric($_POST['id']))) {
                        $error++;
                        echo "Student ID should be in 6 digits</br>";
                    } else if (!ctype_alpha($_POST['fatherName'])) {
                        $error++;
                        echo "Father's Name should contains only alphaphets" . "<br>";
                    }

                    if ($error == 0) {
                        $id = $_POST['id'];
                        $fatherName = $_POST['fatherName'];

                        $query = "UPDATE student_details SET FatherName=$fatherName WHERE StudentID=$id";
                        if ($query_run = mysqli_query($link, $query)) {
                            echo "Father's Name of the student changed Successfully!";
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