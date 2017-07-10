<!DOCTYPE html>

<html>
<head>

    <title> Add Pilot Marks </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

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
        $error=0;
        session_start();
        $year=$_SESSION['year'];
        $serial=$_SESSION['serial'];
        $id_array=$_SESSION['id_array'];

        for ($i=0; $i<sizeof($id_array,1);$i++) {
            require_once '../Connect/Connect.php';
            $error = 0;
            if (isset($_GET['part1_'.$i]) AND isset($_GET['part2_'.$i])) {
                if (!empty($_GET['part1_' . $i]) AND !empty($_GET['part2_' . $i])) {
                    if ($_GET['part1_' . $i] !== (string)(int)$_GET['part1_' . $i]) {
                        $error++;
                        echo 'Marks should be an integer in part-1 of '.$id_array[$i].'<br>';
                    } else {
                        $part1 = (int)$_GET['part1_' . $i];
                        if ($part1 > 100 OR $part1 < 0) {
                            $error++;
                            echo "Marks should be in range 0 - 100 in part-1 of ".$id_array[$i].'<br>';
                        }
                    }

                    if ($_GET['part2_' . $i] !== (string)(int)$_GET['part2_' . $i]) {
                        $error++;
                        echo 'Marks should be an integer in part-2 of '.$id_array[$i].'<br>';
                    } else {
                        $part2 = (int)$_GET['part2_' . $i];
                        if ($part2 > 100 OR $part2 < 0) {
                            $error++;
                            echo "Marks should be in range 0 - 100 in part-2 of ".$id_array[$i].'<br>';
                        }
                    }

                    if ($error == 0) {
                        $s = "INSERT INTO pilot_marks(ID,Serial_no,Year,Part_1,Part_2) VALUES ($id_array[$i],$serial,$year,$part1,$part2)";
                        if (mysqli_query($link, $s)) {
                            echo "Marks updated for ".$id_array[$i].'<br>';

                        } else {
                            echo "Marks not updated for ".$id_array[$i].'<br>';
                        }
                    }
                } else {
                    echo "All marks should be entered for index no ".$id_array[$i].'<br>';
                }
            }
        }?>

    </div>

    <div id="sidebar">

    </div>
    <footer>
        <div class = 'footer1'>
            <h3 id="h3">Address</h3>
            J/St.John Bosco Vidyalayam,<br/>
            Racca Road, Jaffna.
        </div>
        <div class = 'footer2'>
            <h3 id="h3" >Contact Us</h3>
            Email : stjohnbosco@yahoo.com<br />
            Tel: Principal office: +940212222540
        </div>
        <div class = 'footer3'><i>copyright : Futura Labs</i></div>

    </footer>

</div>
</body>
</html>
