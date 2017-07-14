<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>
    <!DOCTYPE html>

    <html>
    <head>

        <title>Student Detail </title>
        <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
        <?php
        include '../Styles/FormStyle.html';
        ?>
        <style>
            input[type=submit]{
                padding: 14px 20px;
                width: 20%;
                margin: 10px 10px 0px 110px;
                background-color: #490c01;
                border-radius: 2px;
                font-style: inherit;
            }

            div[id = message_update]{
                color: darkgreen;
                margin-top: 10px;
                padding: 14px 20px;
                width: auto ;
                border-radius: 2px;
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
            <h2 class="heading">Enter Character Details</h2>
            <?php
            require '../Connect/Connect.php';
            $message = '';
            $message_update = '';
            if ($link || mysqli_select_db($link,$database)){
                //echo "Connection successful;";
            } else {
                $message = "connection failed";
            }

            if (!isset($_GET['id']) || !isset($_GET['character'])) {
                $message ='All the required fields should be filled';
            }else if (empty($_GET['id']) || empty($_GET['character'])) {
                $message ='None of the fields can take an empty value';
            }else if ($_GET['id'] !== (string)(int)$_GET['id']) {
                $message = "StudentID can only be numbers";
            }else if ((int)$_GET['id']<0) {
                $message ="StudentID can only be positive number";
            }else if (strlen($_GET['id']) != 6) {
                $message ="Length of StudentID should be 6";
            }else{
                $id = $_GET['id'];
                $character=$_GET['character'];
                $sql = "SELECT * FROM student_details WHERE StudentID=$id";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $sqli="INSERT INTO `character` (ID, Character_detail) VALUES ('$id', '$character')";
                        if(mysqli_query($link,$sqli)){
                            $message_update="Successfully Stored";
                        }else{
                            $message="This character detail is already added...";
                        }
                    }else{$message="Please check your Student ID...This student ID does not exist!!!";}
                }else{$message="Please check your Student ID...This student ID does not exist!!!";}
            }
            ?>
            <form action="../Templates/AddCharacterTemplate.php" name="fixedform">
                <?php if($message!=''){ ?>
                    <div id="message">
                        <?php echo $message; ?>
                    </div>
                <?php }
                if($message_update!=''){ ?>
                    <div id="message_update">
                        <?php echo $message_update; ?>
                    </div>
                <?php } ?>
                <input type="submit" value="OK" style="color: #ffffff">
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