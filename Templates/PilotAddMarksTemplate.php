<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>
<!DOCTYPE html>

<html>
<head>

    <title>Add Pilot Marks</title>
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
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
        require_once "../Connect/Connect.php";
        session_start();
        $message='';
        $username = $_SESSION['username'];
        $query = "SELECT Role FROM users WHERE username = '$username'";
        $query_run = mysqli_query($link,$query);
        $query_row = mysqli_fetch_assoc($query_run);
        $role = $query_row['Role'];

        if ($role == 'teacher') {
            $sqli = "SELECT grade,division FROM staffuser WHERE username='$username'";
            $que = mysqli_query($link, $sqli);
            $que_row = mysqli_fetch_assoc($que);
            $user_grade = $que_row['grade'];
            $user_division= $que_row['division'];
            $_SESSION['user_division']=$user_division;
            if ($user_grade != 5) {
                $message = "Only grade 5 teachers can enter marks";
            }
        }
        if ($message==''){?>
            <h2 class="heading">Enter Year and Serial No. to enter pilot marks</h2>
            <form action="../PilotMarks/PilotAddMark_1.php" method="get" name="fixedform">
                <fieldset>
                    Year: <br>
                    <input type="text" name="year" placeholder="Year"><br><br>
                    Serial No: <br>
                    <input type="text" name="serial_no" placeholder="Serial No."><br><br>
                    <input type="submit" value="Submit">
                </fieldset>
            </form>
        <?php } else{?>
            <form action="../Templates/PilotMarksTemplate.php" method="get" name="fixedform">
                <div id="message">
                    <?php
                    echo $message;
                    ?>
                </div>
                <input type="submit" value="OK" style="color: #ffffff">
            </form>
        <?php } ?>
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

