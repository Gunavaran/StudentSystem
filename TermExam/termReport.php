<!DOCTYPE html>

<html>
<head>

    <title>Term Exam Report </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
            border-radius: 5px;
            margin-top: 10px;
        }

        div [id = resultbar]{
            float: left;
            width: 40%;
            margin: 20px 10px 0px 300px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: #E3E3E3;
        }
        nav[id=ok]{
            padding: 14px 20px;
            width: auto;
            background-color: #4CAF50;
            border-radius: 2px;
            height:35px;
            text-align: left;

        }

        div[id=heading]{
            color: darkblue;
            font-size: x-large;
        }

    </style>
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
        <div id = resultbar>
            <?php

            include '../Connect/Connect.php';

            if (isset($_GET['year'])&& isset($_GET['term'])){
                $error=0;

                $term=$_GET['term'];
                session_start();
                $username1 = $_SESSION['username'];
                $query_users = "SELECT Role FROM users WHERE username = '$username1'";
                $query_users_run = mysqli_query($link,$query_users);
                $query_users_row = mysqli_fetch_assoc($query_users_run);
                $role = $query_users_row['Role'];
                if($role=='student'){
                    $indexno=$username1;
                    if(empty($_GET['year'])){
                        echo 'Please enter year';
                        $error++;
                    }else {
                        if ($_GET['year'] !== (string)(int)$_GET['year'] OR strlen($_GET['year']) != 4) {
                            $error++;
                            echo 'Invalid input for year';
                        } else {
                            $year = (int)$_GET['year'];
                        }
                    }
                }else{
                    if(empty($_GET['indexno'])||(!isset($_GET['indexno']))||empty($_GET['year'])) {
                        echo 'Please fill all the fields';
                        $error++;
                    }else {
                        if ($_GET['indexno'] !== (string)(int)$_GET['indexno'] OR strlen($_GET['indexno']) != 6) {
                            $error++;
                            echo 'Invalid format of Student ID' . '<br>';
                        } else {
                            $indexno = (int)$_GET['indexno'];
                            if ($_GET['year'] !== (string)(int)$_GET['year'] OR strlen($_GET['year']) != 4){
                                $error++;
                                echo 'Invalid input for year';
                            } else {
                                $year = (int)$_GET['year'];
                            }
                        }
                    }
                }


                if($error==0) {
                    $query = "SELECT * FROM termMarks WHERE StudentID ='$indexno' AND Year='$year' AND Term='$term'";
                    $query_details = "SELECT * FROM student_details where StudentID = '$indexno'";
                    $query_run = mysqli_query($link, $query);
                    $query_run_detail = mysqli_query($link, $query_details);

                    if(mysqli_num_rows($query_run_detail) == NULL) {
                        echo 'No records found for the given Index number-' . $indexno;
                    }else{
                        if (mysqli_num_rows($query_run) == NULL) {
                            echo 'Marks of ' . $indexno . ' for the Term ' . $term . ' of ' . $year . ' are not available.';
                        } else {

                            $query_row_detail = mysqli_fetch_assoc($query_run_detail);
                            $id = $query_row_detail['StudentID'];
                            $firstname = $query_row_detail['FirstName'];
                            $lastname = $query_row_detail['LastName'];
                            $grade = $query_row_detail['Grade'];
                            $division = $query_row_detail['Division'];

                            $query_user = "SELECT grade , division FROM staffuser WHERE username = '$username1'";
                            $query_user_run = mysqli_query($link, $query_user);
                            $query_user_row = mysqli_fetch_assoc($query_user_run);
                            $staff_grade = $query_user_row['grade'];
                            $staff_division = $query_user_row['division'];

                            if (($role == 'student') || (($staff_grade == 'all' || $grade == $staff_grade) && ($staff_division == 'all' || $division == $staff_division))) {
                                ?>
                                <div id='heading'>
                                    <?php
                                    echo "Term Exam Report of " . $indexno . ' for Term-' . $term . ' ' . $year . '</br>';
                                    echo '<br>';
                                    ?>
                                </div>
                                <?php
                                echo 'Student ID: ' . $id . '<br/>' . 'First Name: ' . $firstname . '<br/>' . 'Last Name: ' . $lastname . '<br/>' . 'Grade: ' . $grade . '<br/>' . 'Division: ' . $division . '<br/>';
                                $total = 0;
                                $subcount = 0;
                                while ($query_row = mysqli_fetch_assoc($query_run)) {
                                    $subject = $query_row['Subject'];
                                    $marks = $query_row['Marks'];
                                    $total += $marks;
                                    $subcount += 1;
                                    echo $subject . ': ' . $marks . '<br/>';
                                }
                                $avg = $total / $subcount;
                                echo '<br/>Total = ' . $total . '<br/>Average = ' . $avg . '<br/>';
                            } else {
                                echo "You are restricted to access the requested data";

                            }
                        }
                    }
                }
            }else{
                echo 'Please fill all the fields';
            }
            ?>
            <nav id="ok" style="margin-top: 0px; padding-top: 0px">
                <ul id="nav" style="margin-top: 0px">
                    <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 70px"> <a href="../Templates/TermReportTemplate.php"> OK </a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>
</div>
</body>
</html>


    

