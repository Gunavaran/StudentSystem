<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

<html>
<head>

    <title> View Student Detail </title>
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
        include '../Connect/Connect.php';
        $username = $_SESSION['username'];
        $query = "SELECT Role FROM users WHERE username = '$username'";
        $query_run = mysqli_query($link,$query);
        $query_row = mysqli_fetch_assoc($query_run);
        $role = $query_row['Role'];
        if ($role != 'student') {
            ?>
            <h2 class="heading">Enter Student ID to view the Student Detail</h2>
            <form action="../Details/ViewDetail.php" method="get" name="fixedform">
                <fieldset>
                    <label>Student ID</label><br><br>
                    <input type="text" name="id" placeholder="Student ID"><br><br><br>
                    <input type="submit" value="Submit">
                </fieldset>
            </form>
        <?php }else{
            header('Location: ../Details/ViewDetail.php');
        } ?>

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
