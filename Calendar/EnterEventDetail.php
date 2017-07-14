<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>
    <!DOCTYPE html>

    <html>
    <head>

        <title> Enter Attendance </title>
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
            <?php
            $message = '';
            $message_update = '';
            include "../Connect/Connect.php";
            if (isset($_GET['date']) && isset($_GET['event'])){
                if (!empty($_GET['date']) && !empty($_GET['event'])){
                    $date = $_GET['date'];
                    $event=$_GET['event'];
                    $sql="INSERT INTO calendar (Date,Event) VALUES ('$date', '$event')";
                if(mysqli_query($link,$sql)){
                    $message_update="Successfully Stored";
                }else{
                    $message="Already this event added to the calendar...";
                }


                } else{
                    $message= "Fields cannot take empty values";
                }
            } else{
                $message= "All the required fields should be filled";
            }
            ?>
            <form action="../Templates/EnterEvent.php" name="fixedform">
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


