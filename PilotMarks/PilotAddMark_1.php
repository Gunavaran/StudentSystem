<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/html">
<head>

    <title> Add Pilot Marks </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>
    <style>
        th, td {
            padding: 8px;
            background-color: darkgrey;
        }
        input[name=submit_1]{
            padding: 14px 20px;
            width: 20%;
            margin: 0px 0px 20px 300px;
            background-color: #4CAF50;
            border-radius: 2px;
        }
        input[name=submit_2]{
            padding: 14px 20px;
            width: 20%;
            margin: 20px 0px 20px 280px;
            background-color: #490c01;
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
        <h2 class="heading">Enter Marks</h2>

        <?php
        include '../Connect/Connect.php';
        $message='';
        echo '<fieldset style="background: darkgray">';
        if (isset($_GET['serial_no']) AND isset($_GET['year'])){
            if(!empty($_GET['serial_no']) AND !empty($_GET['year'])){
                if($_GET['year'] !== (string)(int) $_GET['year']) {
                    $message=$message.'Year can only be number'.'<br>';
                }else if((int)$_GET['year']<1990 OR (int)$_GET['year']>date("Y")){
                    $message=$message.'Year should be in range 1991-'.date('Y').'<br>';
                }else{
                    $year=(int)$_GET['year'];
                    $_SESSION['year']=$year;

                }

                if($_GET['serial_no'] !== (string)(int) $_GET['serial_no'] OR (int)$_GET['serial_no']<0) {
                    $message=$message.'Serial Number should be a positive number'.'<br>';
                }else {
                    $serial = (int)$_GET['serial_no'];
                    $_SESSION['serial']=$serial;
                }

                $username = $_SESSION['username'];
                $query = "SELECT Role FROM users WHERE username = '$username'";
                $query_run = mysqli_query($link,$query);
                $query_row = mysqli_fetch_assoc($query_run);
                $role = $query_row['Role'];


                if ($role == 'teacher') {
                    $user_division=$_SESSION['user_division'];
                    $sql = "SELECT StudentID FROM student_details WHERE Grade=5 AND Division='$user_division'";
                }else{
                    $division=$_GET['division'];
                    if ($division=='all') {
                        $sql = "SELECT StudentID FROM student_details WHERE Grade=5";
                    }else{
                        $sql = "SELECT StudentID FROM student_details WHERE Grade=5 AND Division='$division'";
                    }
                }
                if($message=='') {
                    $id_array = array();
                    $result = mysqli_query($link, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            array_push($id_array, $row['StudentID']);

                        }
                    }
                    $_SESSION['id_array']=$id_array;?>
                    <table style="width: 100%">
                        <tr>
                            <th>Student ID</th>
                            <th>Part 1</th>
                            <th>Part 2</th>
                        </tr>
                    <?php
                    for ($i=0; $i<sizeof($id_array,1);$i++){
                    ?>
                    <form action="PilotAddMarks_2.php" method="get" name="fixedform">
                        <tr>
                            <th><?php echo $id_array[$i]; ?></th>
                            <td><input type="text" name="<?php echo 'part1_'.$i; ?>" placeholder="Part-1"></td>
                            <td><input type="text" name="<?php echo 'part2_'.$i; ?>" placeholder="Part-2"></td>
                        </tr>

                        <?php
                        } ?>
                </table><br><br>
                <input type="submit" value="Submit" name="submit_1">
                <?php
                    }
            } else {
            $message = 'None of the fields can take an empty value';
            }
        } else {
            $message='All the required fields should be filled';
        }
        ?>
        <div id="message">
            <?php
            if($message!='') {
                echo $message;?>
                <input type="submit" value="OK" style="color: #ffffff" onclick="document.location.href='../Templates/PilotAddMarksTemplate.php'" name="submit_2"/>
            <?php }
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

    <?php
} else {
    include '../Log_in_out/loginform.php';
}


