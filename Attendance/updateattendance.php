<?php
session_start();
?>
<html>
<head>

    <title> Update Attendance </title>
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
        <h2 class="heading"> Enter Attendance To Be Altered</h2>
        <form action="updateattendance.php" method="post" name="fixedform">
            Date: <br>
            <input type="date" name="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>"><br><br>
            Grade:<br>
            <input type="text" name="grade" value="<?php if (isset($_POST['grade'])){echo $_POST['grade'];} ?>"><br><br>
            Division:<br>
            <input type="text" name="division" value="<?php if (isset($_POST['division'])){echo $_POST['division'];} ?>"><br><br>
            StudentID:<br>
            <input type="text" name="id"><br><br>
            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $message ='';
            if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division']) && isset($_POST['id'])){
                if(!empty($_POST['date']) && !empty($_POST['grade']) && !empty($_POST['division']) && !empty($_POST['id'])){

                    $date = $_POST['date'];
                    $grade = $_POST['grade'];
                    $grade2 = $grade * 1 ;
                    $division = $_POST['division'];
                    $id = $_POST['id'];
                    $id2 = $id * 1;
                    $grade_array = array();
                    $division_array = array();

                    $query_attendance = "SELECT Attendance FROM attendance WHERE StudentID = '$id' AND Date = '$date'";
                    $query_attendance_run = mysqli_query($link,$query_attendance);
                    $query_row = mysqli_fetch_assoc($query_attendance_run);
                    $attendance = $query_row['Attendance'];

                    $grade_query = "SELECT Grade, Division FROM student_details";
                    $grade_query_run = mysqli_query($link,$grade_query);
                    while($grade_query_row = mysqli_fetch_assoc($grade_query_run)){
                        $gradedb = $grade_query_row['Grade'];
                        $divisiondb = $grade_query_row['Division'];
                        if (!in_array($gradedb,$grade_array)){
                            array_push($grade_array,$gradedb);
                        }
                        if (!in_array($divisiondb,$division_array)){
                            array_push($division_array,$divisiondb);
                        }
                    }

                    $query_sync = "SELECT Division FROM student_details WHERE Grade = '$grade'";
                    $query_sync_run = mysqli_query($link,$query_sync);
                    $sync_array = array();
                    while($query_sync_row = mysqli_fetch_assoc($query_sync_run)){
                        $sync =  $query_sync_row['Division'];
                        if (!in_array($sync,$sync_array)){
                            array_push($sync_array,$sync);
                        }
                    }

                    $query_id_sync = "SELECT StudentID FROM student_details WHERE Grade = '$grade' AND Division = '$division'";
                    $query_id_sync_run = mysqli_query($link,$query_id_sync);
                    $id_sync_array = array();

                    while($id_sync_row = mysqli_fetch_assoc($query_id_sync_run)){
                        $iddb = $id_sync_row['StudentID'];
                        array_push($id_sync_array,$iddb);
                    }

                    $user = $_SESSION['username'];
                    $query_user = "SELECT grade , division FROM staffuser WHERE username = '$user'";
                    $query_user_run = mysqli_query($link, $query_user);
                    $query_user_row = mysqli_fetch_assoc($query_user_run);
                    $staff_grade = $query_user_row['grade'];
                    $staff_division = $query_user_row['division'];

                    if(strtoupper($attendance) == 'A'){
                        $new_value = 'P';
                    } else {
                        $new_value = 'A';
                    }

                    $query = "UPDATE attendance SET Attendance = '$new_value' WHERE StudentID = '$id' AND Date = '$date'";
                    if (strlen($id) != 6){
                        $message = "Length of StudentID should be 6. Submit Failed!!!";
                    } else if(!is_numeric($id)){
                        $message = "StudentID can only be numbers. Submit Failed!!!";
                    } else if (!is_int($id2)) {
                        $message = 'StudentID can only be an integer values. Submit Failed!!!';
                    } else if(strlen($grade) != 1){
                        $message = "Length of Grade should be 1. Submit Failed!!!";
                    } else if(strlen($division) != 1){
                        $message = "Length of Division should be 1. Submit Failed!!!";
                    } else if(!ctype_alpha($division)){
                        $message = "Division should be an alphabet. Submit Failed!!!";
                    } else if(!is_numeric($grade)){
                        $message = "Grade can only be numbers. Submit Failed!!!";
                    } else if (!is_int($grade2)) {
                        $message = 'Grade can only be an integer values. Submit Failed!!!';
                    } else if (!in_array($grade,$grade_array)) {
                        $message = 'Grade does not exist. Submit Failed!!!';
                    } else if (!in_array($division,$division_array)) {
                        $message = 'Division does not exist. Submit Failed!!!';
                    } else if (!in_array($division,$sync_array)) {
                        $message = 'Division does not exist for the given grade. Submit Failed!!!';
                    } else if (!in_array($id,$id_sync_array)) {
                        $message = 'StudentId does not belong to the given grade and division. Submit Failed!!!';
                    } else if($staff_grade != 'all' && $grade != $staff_grade){
                        $message = "Access denied to the given Grade. Submit Failed!!!";
                    }  else if($staff_division != 'all' && $division != $staff_division){
                        $message = "Access denied to the given Division. Submit Failed!!!";
                    } else if($attendance == NULL){
                        $message='Attendance does not exist';
                    } else if($query_run = mysqli_query($link, $query)){
                        $message='Update Successful';
                    }  else {
                        $message= 'Update Failed!!!';
                    }

                } else {
                    $message = 'None of the fields can take an empty value';
                }

            } else {
                $message =  'All the required fields should be filled';
            }

            ?>


            <div id="message">
                <?php
                echo $message
                ?>
            </div>

        </form>

    </div>

    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>

</div>

</body>
</html>