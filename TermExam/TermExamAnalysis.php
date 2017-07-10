<!DOCTYPE html>

<html>
<head>

    <title>Term Exam Analysis Report</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
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
        require '../Connect/Connect.php';
        if (isset($_GET['year']) AND isset($_GET['grade']) AND isset($_GET['term']) AND isset($_GET['subject']) AND isset($_GET['division'])) {
            if(!empty($_GET['year']) AND !empty($_GET['grade']) AND !empty($_GET['term']) AND !empty($_GET['subject']) AND !empty($_GET['division'])) {
                if($_GET['year'] === (string)(int) $_GET['year']) {
                    $year = (int)$_GET['year'];
                    if($year>1990 AND $year<=date("Y")){
                        $grade = $_GET['grade'];
                        $term = $_GET['term'];
                        $subject = $_GET['subject'];
                        $division = $_GET['division'];
                        if ($link || mysqli_select_db($link, $database)) {
                            //echo "Connection successful;";
                        } else {
                            echo "connection failed";
                        }
                        if ($subject == 'all') {
                            $subject_all = ['religion_hin', 'religion_rc', 'tamil', 'mathematics', 'social', 'english'];
                        } else {
                            $subject_all = [$subject];
                        }
                        ?>
                        <table style="width: 100%">
                            <tr>
                                <th>Subject</th>
                                <th>0-10</th>
                                <th>11-20</th>
                                <th>21-30</th>
                                <th>31-40</th>
                                <th>41-50</th>
                                <th>51-60</th>
                                <th>61-70</th>
                                <th>71-80</th>
                                <th>81-90</th>
                                <th>91-100</th>
                                <th>Pass</th>
                            </tr>
                            <?php
                            foreach ($subject_all as $subject) {
                                if ($division == 'all') {
                                    $sql = "SELECT Marks FROM term_marks LEFT JOIN detail ON term_marks.ID=detail.ID WHERE term_marks.Year='$year' AND term_marks.Term=$term AND term_marks.Subject='$subject' AND detail.Grade='$grade'";
                                } else {
                                    $sql = "SELECT Marks FROM term_marks LEFT JOIN detail ON term_marks.ID=detail.ID WHERE term_marks.Year='$year' AND term_marks.Term=$term AND term_marks.Subject='$subject' AND detail.Grade='$grade' AND detail.Division='$division'";
                                }
                                $result = mysqli_query($link, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $count1 = 0;
                                        $count2 = 0;
                                        $count3 = 0;
                                        $count4 = 0;
                                        $count5 = 0;
                                        $count6 = 0;
                                        $count7 = 0;
                                        $count8 = 0;
                                        $count9 = 0;
                                        $count10 = 0;
                                        $pass = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $marks = $row['Marks'];
                                            if ($marks < 11) {
                                                $count1++;
                                            } else if ($marks < 21) {
                                                $count2++;
                                            } else if ($marks < 31) {
                                                $count3++;
                                            } else if ($marks < 41) {
                                                $count4++;
                                            } else if ($marks < 51) {
                                                $count5++;
                                            } else if ($marks < 61) {
                                                $count6++;
                                            } else if ($marks < 71) {
                                                $count7++;
                                            } else if ($marks < 81) {
                                                $count8++;
                                            } else if ($marks < 91) {
                                                $count9++;
                                            } else if ($marks < 100) {
                                                $count10++;
                                            }
                                        }
                                        $pass = ($count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10) / mysqli_num_rows($result) * 100;
                                        ?>

                                        <tr>
                                            <td><?php echo $subject; ?></td>
                                            <td><?php echo $count1; ?></td>
                                            <td><?php echo $count2; ?></td>
                                            <td><?php echo $count3; ?></td>
                                            <td><?php echo $count4; ?></td>
                                            <td><?php echo $count5; ?></td>
                                            <td><?php echo $count6; ?></td>
                                            <td><?php echo $count7; ?></td>
                                            <td><?php echo $count8; ?></td>
                                            <td><?php echo $count9; ?></td>
                                            <td><?php echo $count10; ?></td>
                                            <td><?php echo $pass . '%'; ?></td>

                                        </tr>
                                        <?php
                                    } else {
                                        echo "No marks entered for " . $subject . '<br><br>';
                                    }
                                }
                            }
                            echo '</table>';
                    }else{echo 'Year should be in range 1991-'.date('Y');}
                }else{echo 'Year can only be number';}
            }else {echo 'None of the fields can take an empty value';}
        }else {echo 'All the required fields should be filled';}
        ?>

    </div>

    <div id="sidebar">
        <nav id="competition">
            <ul id="nav">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-bottom: 0px"> <a href="../compDetail.php">Competition Details</a></li>
            </ul>
        </nav>

        <nav id="competition" style="margin-top: 0px; padding-top: 0px">
            <ul id="nav" style="margin-top: 0px">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 20px"> <a href="../Calendar.php">School Calendar</a></li>
            </ul>
        </nav>

        <?php
        session_start();
        $username = $_SESSION['username'];

        if ($username == 'principal'){
            ?>

            <nav id="competition" style="margin-top: 0px; padding-top: 0px">
                <ul id="nav" style="margin-top: 0px">
                    <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 45px"> <a href="../addStaff.php">Add Staff</a></li>
                </ul>
            </nav>

            <?php
        }
        ?>


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
