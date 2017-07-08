<!DOCTYPE html>

<html>
<head>

    <title>Update Pilot Marks</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="../Templates/index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="/Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="/Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="UpdatePilotMarks.php" method="get">
            Year:<br>
            <input type="text" name="year"><br><br>
            Serial No:<br>
            <input type="text" name="serialnum"><br><br>
            Student ID:<br>
            <input type="text" name="indexnum"><br><br>
            Part:<br>
            <select name='part'>
                <option value="part1">Part-1</option>
                <option value="part2">Part-2</option>
            </select>
            <br><br>
            Marks:<br>
            <input type="text" name="marks"><br><br>
            <input type="submit" value="Submit"><br><br>



                <?php
                include '../Connect/Connect.php';

                $error=0;
                if (isset($_GET['serialnum']) AND isset($_GET['indexnum']) AND isset($_GET['year']) AND isset($_GET['marks']) ){
                    if(!empty($_GET['serialnum']) AND !empty($_GET['indexnum']) AND !empty($_GET['year']) AND !empty($_GET['marks'])){
                        if($_GET['serialnum'] !== (string)(int) $_GET['serialnum']) {
                            $error++;
                            echo 'Serial Number should be a positive number<br>';
                        }else {
                            $serial = (int)$_GET['serialnum'];
                        }

                        if($_GET['indexnum'] !== (string)(int) $_GET['indexnum'] OR strlen($_GET['indexnum'])!=6) {
                            $error++;
                            echo 'Invalid format of Student ID'.'<br>';
                        }else{
                            $indexnum=(int)$_GET['indexnum'];
                        }

                        if($_GET['year']!==(string)(int)$_GET['year'] OR strlen($_GET['year'])!=4){
                            $error++;
                            echo 'Invalid input for year';
                        }else{
                            $year=(int)$_GET['year'];                        }

                        if($_GET['marks'] !== (string)(int) $_GET['marks']) {
                            $error++;
                            echo 'Marks should be an integer'.'<br>';
                        }else {
                            $marks = (int)$_GET['marks'];
                            if ($marks > 100 OR $marks < 0) {
                                $error++;
                                echo "Marks should be in range 0 to 100".'<br>';
                            }
                        }

                        if($error==0) {
                            $part=$_GET['part'];
                            if($part=='part1'){
                                $query = "UPDATE pilot_marks SET Part1 = '$marks' WHERE StudentID = '$indexnum' AND  Year = '$year' AND SerialNumber ='$serial'";
                                if($query_run = mysqli_query($link, $query)){
                                    echo 'Update Successful';
                                } else {
                                    echo 'Update Failed';
                                }
                            }elseif ($part=='part2'){
                                $query = "UPDATE pilot_marks SET Part2 = '$marks' WHERE StudentID = '$indexnum' AND  Year = '$year' AND SerialNumber ='$serial'";
                                if($query_run = mysqli_query($link, $query)){
                                    echo 'Update Successful';
                                } else {
                                    echo 'Update Failed';
                                }
                            }
                        }
                    }else {
                        echo 'None of the fields can take an empty value';
                    }

                }else {
                    echo 'All the required fields should be filled';
                }
                ?>
</form>
</div>

<div id="sidebar">

</div>

<footer>
    <h3 class="footer-widget-title">Contact Us</h3>
    <div class="textwidget">
        <p>J/St.John Bosco Vidyalayam,<br/>
            Racca Road, Jaffna.</p>
        <p>Email : stjohnbosco@yahoo.com<br />
            Tel: Principal office: +940212222540</p>
    </div>
    <p align="center" style="font-size: large"><b>All rights reserved</b> </p>
</footer>

</div>
</body>
</html>
