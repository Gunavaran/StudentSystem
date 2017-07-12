<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

<html>
<head>

    <title>Update Division</title>
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
        <form action="Division.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Division:<br><br>
            <select name='division'>
                <option value = 'A'>A</option>
                <option value = 'B'>B</option>
                <option value = 'C'>C</option>
                <option value = 'D'>D</option>
                <option value = 'E'>E</option>
            </select><br><br>

            <input type="submit" value="Submit">



            <?php

            include '../Connect/Connect.php';
            $error=0;

                    if (isset($_POST['id'])) {
                        if (!empty($_POST['id'])) {
                            if ($_POST['id'] != (string)(int)$_POST['id'] || (int)$_POST['id'] < 0) {
                                $error++;
                                echo "Student ID should be a positive number" . "<br>";
                            } else if (strlen($_POST['id']) != 6  || (!is_numeric($_POST['id']))) {
                                $error++;
                                echo "Student ID should be in 6 digits</br>";
                            }
                            if ($error==0) {
                                $id = (int)$_GET['id'];
                                $year = $_GET['year'];
                                $subject = $_GET['subject'];
                                $marks = $_GET['marks'];
                                $term = $_GET['term'];

                                $sql_g_d="SELECT Division FROM student_details WHERE StudentID=$id";
                             //   $quer=mysqli_query($link,$sql_g_d);
                                if(mysqli_query($link,$sql_g_d)) {
                                    $error=0;

                                }else{
                                    $error++;
                                    echo  'Index number does not exist';
                                }
                            }

                            if ($error == 0) {
                                $id = $_POST['id'];
                                $division = $_POST['division'];

                                $query = "UPDATE student_details SET Division=$division WHERE StudentID=$id";
                                if ($query_run = mysqli_query($link, $query)) {
                                    echo 'Division of the student changed Successfully!';
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
