<!DOCTYPE html>

<html>
<head>

    <title> Add Pilot Marks </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>
    <style>
        div[id = message_updade]{
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

        session_start();
        $year=$_SESSION['year'];
        $serial=$_SESSION['serial'];
        $id_array=$_SESSION['id_array'];
        ?>
        <form name="fixedform" action="PilotAddMark_1.php">
        <?php
        for ($i=0; $i<sizeof($id_array,1);$i++) {
            require_once '../Connect/Connect.php';
            $message='';
            $message_update='';
            if (isset($_GET['part1_'.$i]) AND isset($_GET['part2_'.$i])) {
                if (!empty($_GET['part1_' . $i]) AND !empty($_GET['part2_' . $i])) {
                    if ($_GET['part1_' . $i] !== (string)(int)$_GET['part1_' . $i]) {
                        $message=$message.'- Marks should be an integer in part-1 of '.$id_array[$i].'<br>';
                    } else {
                        $part1 = (int)$_GET['part1_' . $i];
                        if ($part1 > 100 OR $part1 < 0) {
                            $message=$message."- Marks should be in range 0 - 100 in part-1 of ".$id_array[$i].'<br>';
                        }
                    }

                    if ($_GET['part2_' . $i] !== (string)(int)$_GET['part2_' . $i]) {
                        $message=$message.'- Marks should be an integer in part-2 of '.$id_array[$i].'<br>';
                    } else {
                        $part2 = (int)$_GET['part2_' . $i];
                        if ($part2 > 100 OR $part2 < 0) {
                            $message=$message."- Marks should be in range 0 - 100 in part-2 of ".$id_array[$i].'<br>';
                        }
                    }

                    if ($message=='') {
                        $s = "INSERT INTO pilot_marks(StudentID,SerialNo,Year,Part_1,Part_2) VALUES ($id_array[$i],$serial,$year,$part1,$part2)";
                        if (mysqli_query($link, $s)) {
                            $message_update=$message_update."- Marks updated for ".$id_array[$i].'<br>';

                        } else {
                            $message=$message."- Marks not updated... Already marks entered for ".$id_array[$i].'<br>';
                        }
                    }
                } else {
                    $message=$message."- All marks should be entered for index no ".$id_array[$i].'<br>';
                }
            }
            ?>
            <div id="message_updade">
                <?php
                echo $message_update
                ?>
            </div>
            <div id="message">
                <?php
                echo $message;
                ?>
            </div>
            <?php
        }?>


        </form>

    </div>

    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>

</div>
</body>
</html>
