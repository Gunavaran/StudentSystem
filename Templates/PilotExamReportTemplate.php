<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>
<!DOCTYPE html>

<html>
<head>

    <title> Pilot Exam Report </title>
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
            <li> <a href="ProfileTemplate.php">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
            include "../Connect/Connect.php";
            $username = $_SESSION['username'];


            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student'){

        ?>
        <form action="PilotExamReportTemplate.php" method="post" name="fixedform">
            <fieldset>
                <legend>Choose Index Number</legend>
                Student ID:<br>
                <input type='text' name='indexno'>
                <br><br>
                <input type='submit' value='Submit'>
            </fieldset>

            <?php
            include '../PilotExam/PilotReport.php';
            } else {
                include "../Connect/Connect.php";
                $username = $_SESSION['username'];
                $query_marks = "SELECT * FROM pilot_marks WHERE StudentID ='$username' ";
                $query_marks_run = mysqli_query($link, $query_marks);

                if (mysqli_num_rows($query_marks_run) == NULL){
                    echo "No marks has been found";
                } else {
                    while ($query_row = mysqli_fetch_assoc($query_marks_run)) {
                        $serial = $query_row['SerialNo'];
                        $part1 = $query_row['Part1'];
                        $part2 = $query_row['Part2'];
                        echo 'Serial ' . $serial . ':<br/>';
                        echo 'Part1: ' . $part1 . '   ';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPart2: ' . $part2 . '   ';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal: ';
                        echo ((int)$part1 + (int)$part2) / 2;
                        echo '<br/>';

                    }

                }
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







