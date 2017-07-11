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
                    $division = $_POST['division'];
                    $id = $_POST['id'];

                    $query_attendance = "SELECT Attendance FROM attendance WHERE StudentID = '$id' AND Date = '$date'";
                    $query_attendance_run = mysqli_query($link,$query_attendance);
                    $query_row = mysqli_fetch_assoc($query_attendance_run);
                    $attendance = $query_row['Attendance'];
                    if(strtoupper($attendance) == 'A'){
                        $new_value = 'P';
                    } else {
                        $new_value = 'A';
                    }
                    $query = "UPDATE attendance SET Attendance = '$new_value' WHERE StudentID = '$id' AND Date = '$date'";
                    if($query_run = mysqli_query($link, $query)){
                        $message='Update Successful';
                    } else {
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