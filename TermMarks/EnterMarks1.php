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
            form[name = fixedform]{
                float: left;
                width: 80%;
                margin: 20px 10px 0px 100px;
                padding: 10px;
                border: 2px solid #E3E3E3;
                border-radius: 5px;
                font-family: "Adobe Gothic Std B";
                background-color: darkgrey;
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
            <?php
            require_once '../Connect/Connect.php';
            $id_array=$_SESSION['id_array'];
            ?>

            <form name="fixedform" action="../Templates/EnterTermMarksTemplate.php">
                <?php
                for ($i=0; $i<sizeof($id_array,1);$i++) {
                    require_once '../Connect/Connect.php';
                    $message='';
                    $message_update='';
                    $subject = $_SESSION['subject'];
                    $term = $_SESSION['term'];
                    $year = $_SESSION['year'];
                    if (isset($_POST['marks'.$i])) {
                        if (!empty($_POST['marks'.$i])) {
                            if ($_POST['marks'.$i] != (string)(int)$_POST['marks'.$i] || (int)$_POST['marks'.$i] < 0) {
                                $message= "Marks should be a positive number";
                            } elseif ((int)$_POST['marks'.$i] > 100) {
                                $message= "Marks should be less than or equal to 100";
                            }
                            if ($message=='') {
                                $marks=$_POST['marks'.$i];
                                $s = "INSERT INTO termmarks (StudentID, Subject, Marks, Year, Term) VALUES ('$id_array[$i]','$subject','$marks','$year', '$term')";
                                if (mysqli_query($link, $s)) {
                                    $message_update="- Marks entered for ".$id_array[$i]." on ".$_SESSION['subject'];

                                } else {
                                    $message="- Submit failed... Marks already entered for ".$id_array[$i]." on ".$_SESSION['subject'];
                                }
                            }
                        } else {
                            $message="- Marks should be entered for index no ".$id_array[$i];
                        }
                    }
                    ?>
                    <div id="message_update">
                        <?php
                        if ($message_update!='') {echo $message_update;} ?>
                    </div>
                    <div id="message">
                        <?php
                        if ($message!=''){echo $message;} ?>
                    </div>
                    <?php
                }?>


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
