<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

<html>
<head>

    <title>Update Grade</title>
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
        <form action="Grade.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Grade:<br><br>
            <select name='grade'>
                <option value = '01'>01</option>
                <option value = '02'>02</option>
                <option value = '03'>03</option>
                <option value = '04'>04</option>
                <option value = '05'>05</option>
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

                                $sql_g_d="SELECT Grade FROM student_details WHERE StudentID=$id";
                              //  $quer=mysqli_query($link,$sql_g_d);
                                if($mysqli_query($link,$sql_g_d)) {
                                    $error=0;

                                }else{
                                    $error++;
                                    echo  'Index number does not exist';
                                }
                            }


                            if ($error == 0) {
                                $id = $_POST['id'];
                                $grade = $_POST['grade'];

                                $query = "UPDATE student_details SET Grade=$grade WHERE StudentID=$id";
                                if ($query_run = mysqli_query($link, $query)) {
                                    echo 'Grade of the student changed Successfully!';
                                } else {
                                    echo 'Failed!!!';
                                }
                            }

                            }
                            else {
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