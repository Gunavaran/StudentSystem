
<!DOCTYPE html>

<html>
<head>

    <title> Enter Attendance </title>
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
        <h2 class="heading"> Student Attendance Form</h2>
        <form action="enter_attendance.php" method="post" name="fixedform">
            Date: <br>
            <input type="date" name="date" value="<?php if (isset($_POST['date'])){echo $_POST['date'];} ?>"><br><br>
            Grade:<br>
            <input type="text" name="grade" value="<?php if (isset($_POST['grade'])){echo $_POST['grade'];} ?>"><br><br>
            Division:<br>
            <input type="text" name="division" value="<?php if (isset($_POST['division'])){echo $_POST['division'];} ?>"><br><br>
            StudentID:<br>
            <input type="text" name="id"><br><br>
            Attendance: <br>
            <input type="text" name="attendance" placeholder="Enter 'p/P' for present and 'a/A' for absent"><br><br>

            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $message = '';
            if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division']) && isset($_POST['id']) && isset( $_POST['attendance'])){
                if(!empty($_POST['date']) && !empty($_POST['grade']) && !empty($_POST['division']) && !empty($_POST['id']) &&!empty($_POST['attendance'])){
                    $date = $_POST['date'];
                    $grade = $_POST['grade'];
                    $grade2 = $grade * 1 ;
                    $division = strtoupper($_POST['division']);
                    $id = $_POST['id'];
                    $id2 = $id * 1;
                    $attendance = strtoupper($_POST['attendance']);
                    $date_today = date_create(date("Y-m-d"));
                    $date_entered = date_create($date);
                    $date_diff = date_diff($date_entered,$date_today);
                    $grade_array = array();
                    $division_array = array();

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

                    if($attendance != 'A' && $attendance != 'P') {
                        $message = 'Attendance can take values p/P or a/A only. Submit Failed!!!';
                    } else if(strlen($id) != 6){
                        $message = "Length of StudentID should be 6. Submit Failed!!!";
                    }else if(!is_numeric($id)){
                        $message = "StudentID can only be numbers. Submit Failed!!!";
                    } else if (!is_int($id2)) {
                        $message = 'StudentID can only be an integer values. Submit Failed!!!';
                    } else if ($date_diff->format("%R%a")<0) {
                        $message = 'Date cannot be in the future. Submit Failed!!!';
                    } else if(strlen($grade) != 1){
                        $message = "Length of Grade should be 1. Submit Failed!!!";
                    }else if(strlen($division) != 1){
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
                    } else {
                        $query = "INSERT INTO attendance (StudentID, Attendance, Date) VALUES ('$id', '$attendance', '$date')";
                        if($query_run = mysqli_query($link, $query)){
                            $message = 'Successfully Stored';
                        }else{
                            $message = 'Submit Failed!!!. Data might already exist';
                        }
                    }

                } else {
                    $message = 'None of the fields can take an empty value. Submit Failed!!!';
                }

            } else {
                $message = 'All the required fields should be filled. Submit Failed!!!';
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

