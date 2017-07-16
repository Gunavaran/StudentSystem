<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>
<!DOCTYPE html>

<html>
<head>

    <title> Add Pilot Marks </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>
    <style>
        input[name=submit_2]{
            padding: 14px 20px;
            width: 20%;
            margin: 20px 0px 20px 400px;
            background-color: #490c01;
            border-radius: 2px;
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
        require_once '../Connect/Connect.php';
        $year=$_SESSION['year'];
        $serial=$_SESSION['serial'];
        $id_array=$_SESSION['id_array'];
        ?>
        <form name="fixedform" action="../Templates/PilotAddMarksTemplate.php">
        <?php
        $x=0;
        for ($i=0; $i<sizeof($id_array,1);$i++) {
            require_once '../Connect/Connect.php';
            $message='';
            $message_update='';
            if (isset($_GET['part1_'.$i]) AND isset($_GET['part2_'.$i])) {
                if (!empty($_GET['part1_' . $i]) AND !empty($_GET['part2_' . $i])) {
                    if ($_GET['part1_' . $i] !== (string)(int)$_GET['part1_' . $i]) {
                        $message='- Marks should be an integer in part-1 of '.$id_array[$i].'<br>';
                    } else {
                        $part1 = (int)$_GET['part1_' . $i];
                        if ($part1 > 100 OR $part1 < 0) {
                            $message="- Marks should be in range 0 - 100 in part-1 of ".$id_array[$i].'<br>';
                        }
                    }

                    if ($_GET['part2_' . $i] !== (string)(int)$_GET['part2_' . $i]) {
                        $message=$message.'- Marks should be an integer in part-2 of '.$id_array[$i];
                    } else {
                        $part2 = (int)$_GET['part2_' . $i];
                        if ($part2 > 100 OR $part2 < 0) {
                            $message=$message."- Marks should be in range 0 - 100 in part-2 of ".$id_array[$i];
                        }
                    }

                    if ($message=='') {
                        $s = "INSERT INTO pilot_marks(StudentID,SerialNo,Year,Part1,Part2) VALUES ($id_array[$i],$serial,$year,$part1,$part2)";
                        if (mysqli_query($link, $s)) {
                            $message_update="- Marks updated for ".$id_array[$i]."for Serial No".$serial;

                        } else {
                            $message="- Marks not updated... Already marks entered for ".$id_array[$i];
                        }
                    }
                } else {
                    $message="- All marks should be entered for index no ".$id_array[$i];
                }
            }
            if ($message_update!='') { ?>
                <div id="message_update">
                    <?php
                    echo $message_update;
                    $x++;?>
                </div>
            <?php
            }
            if ($message!=''){ ?>
            <div id="message">
                <?php echo $message; ?>
            </div>
            <?php }
        }?>
        </form>
        <?php
            if($x==sizeof($id_array,1)){?>
                <input type="submit" value="OK" style="color: #ffffff" onclick="document.location.href='../Templates/PilotAddMarksTemplate.php'" name="submit_2"/>
            <?php }
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