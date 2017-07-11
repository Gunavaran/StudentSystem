<!DOCTYPE html>

<html>
<head>

    <title> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
            border-radius: 5px;
            margin-top: 10px;
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
        include '../Connect/Connect.php';
        session_start();
        $username = $_SESSION['username'];
        $query = "SELECT Role FROM users WHERE username = '$username'";
        $query_run = mysqli_query($link,$query);
        $query_row = mysqli_fetch_assoc($query_run);
        $role = $query_row['Role'];

        if ($role == 'principal' OR $role=='teacher') {?>
        <nav id="term_marks_navigation">
            <ul id="nav">
                <li><a href='../TermMarks/EnterMarks.php'>Enter Term Marks </a> </li>
            </ul>
        </nav>
        <?php }?>

        <nav id="term_marks_navigation">
            <ul id="nav">
                <li><a href='../TermMarks/updatetermmarks.php'>Update Term Marks </a> </li>
            </ul>
        </nav>

        <nav id="term_marks_navigation">
            <ul id="nav">
                <li><a href='TermReportTemplate.php'> Term Exam Report </a> </li>
            </ul>
        </nav>

        <?php
        if ($role != 'student') { ?>
        <nav id="pilot_marks_navigation">
            <ul id="nav">
                <li> <a href="TermExamAnalysisTemplate.php">Term Exam Analysis</a></li>
            </ul>
        </nav>
        <?php }?>

    </div>

    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>
</div>
</body>
</html>