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
            th, td {
                padding: 8px;
                background-color: darkgrey;
            }
            div[id = message]{
                color: crimson;
                margin-top: 10px;
                padding: 14px 20px;
                width: auto ;
                border-radius: 2px;
                background-color: #E3E3E3;
                font-family: "Adobe Gothic Std B";
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
            include "../Connect/Connect.php";
            if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division'])){
                if (!empty($_POST['date']) && !empty($_POST['grade']) && !empty($_POST['division'])){
                    $username = $_SESSION['username'];
                    $query = "SELECT Role FROM users WHERE username = '$username'";
                    $query_run = mysqli_query($link,$query);
                    $query_row = mysqli_fetch_assoc($query_run);
                    $role = $query_row['Role'];

                    $grade = $_POST['grade'];
                    $division = $_POST['division'];
                    $date = $_POST['date'];
                    $date_today = date_create(date("Y-m-d"));
                    $date_entered = date_create($date);
                    $date_diff = date_diff($date_entered,$date_today);

                    $_SESSION['date'] = $date;

                    if ($role == 'teacher'){
                        $query = "SELECT grade, division FROM staffuser WHERE username = '$username'";
                        $query_run = mysqli_query($link,$query);
                        $query_row = mysqli_fetch_assoc($query_run);
                        $grade_teacher = $query_row['grade'];
                        $division_teacher = $query_row['division'];

                        if ($grade != $grade_teacher){
                            $message .= "You do not have access to this grade ";
                        } else if ($division != $division_teacher){
                            $message .= "You do not have access to this division";
                        }
                    }

                    if ($date_diff->format("%R%a")<0) {
                        $message .= 'Date cannot be in the future. Submit Failed!!!';
                    }

                    if ($message == ''){
                        $sql = "SELECT StudentID FROM student_details WHERE Grade = '$grade' AND Division = '$division'";
                        $id_array = array();
                        $sql_run = mysqli_query($link, $sql);
                        if ($sql_run->num_rows > 0){
                            while($sql_row = mysqli_fetch_assoc($sql_run)){
                                array_push($id_array,$sql_row['StudentID']);
                            }
                            $_SESSION['id_array']=$id_array;
                            ?>
                            <table style="width: 100%">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Attendance</th>
                                </tr>
                                <?php
                                for ($i=0; $i<sizeof($id_array,1);$i++){
                                ?>
                                <form action="enter_attendance1.php" method="post" name="fixedform">
                                    <tr>
                                        <th><?php echo $id_array[$i]; ?></th>
                                        <td><input type="text" name="<?php echo 'attendance'.$i; ?>" placeholder="Enter 'p/P' for present and 'a/A' for absent"></td>
                                    </tr>


                                    <?php
                                    } ?>

                            </table><br><br>
                            <input type="submit" value="Submit">

                            <?php

                        } else {
                            $message = "No data is found";
                        }

                    }


                } else{
                    $message .= "Fields cannot take empty values";
                }
            }else{
                $message .= "All the required fields should be filled";
            }
            ?>
            <div id="message">
                <?php
                echo $message;
                ?>
            </div>

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


