<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>
<!DOCTYPE html>

<html>
<head>

    <title> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include "../Styles/FormStyle.html";
    ?>
    <style>
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
            border-radius: 5px;
            margin-top: 10px;
        }
        select{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
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


    </style>
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
        $query_run = mysqli_query($link, $query);
        $query_row = mysqli_fetch_assoc($query_run);
        $role = $query_row['Role'];
    if ($role != 'student'){
        ?>
        <h2 class="heading">Choose Report of Individual Student / Report of a Division </h2>
        <form action = "PilotExamReportTemplate.php" method="post" name = "fixedform">
            <select name='div/grad'>
                <option value = 'individual'>Individual</option>
                <option value = 'division'>Division</option>
            </select><br><br>
            <input type="submit" value="Submit">

        </form>

        <?php
    } else {
        include "../Connect/Connect.php";
        $username = $_SESSION['username'];
        $query_marks = "SELECT * FROM pilot_marks WHERE StudentID ='$username' ";
        $query_marks_run = mysqli_query($link, $query_marks);

        if (mysqli_num_rows($query_marks_run) == NULL) {
            echo "No marks has been found";
        } else {
            while ($query_row = mysqli_fetch_assoc($query_marks_run)) {
                $serial = $query_row['SerialNo'];
                $part1 = $query_row['Part1'];
                $part2 = $query_row['Part2'];
                ?>
                <div id="resultbar">
                    <?php
                    echo 'Serial ' . $serial . ':<br/>';
                    echo 'Part1: ' . $part1 . '   ';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPart2: ' . $part2 . '   ';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal: ';
                    echo ((int)$part1 + (int)$part2) / 2;
                    echo '<br/>';
                    ?>
                </div>

            <?php
            }

        }
    }

        ?>


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




