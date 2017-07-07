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
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
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
                    $grade = $_GET['grade'];
                    $term = $_GET['term'];
                    $subject = $_GET['subject'];
                    $division = $_GET['division'];
                    if ($link || mysqli_select_db($link, $database)) {
                        //echo "Connection successful;";
                    } else {
                        echo "connection failed";
                    }
                    if ($subject=='all') {
                        $subject_all=['religion_hin','religion_rc','tamil','mathematics','social','english'];
                    }else {
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
                        </tr>
                    <?php
                    foreach($subject_all as $subject) {
                        if ($division == 'all') {
                            $sql = "SELECT Marks FROM term_marks LEFT JOIN detail ON term_marks.ID=detail.ID WHERE term_marks.Year='$year' AND term_marks.Term=$term AND term_marks.Subject='$subject' AND detail.Grade='$grade'";
                        } else {
                            $sql = "SELECT Marks FROM term_marks LEFT JOIN detail ON term_marks.ID=detail.ID WHERE term_marks.Year='$year' AND term_marks.Term=$term AND term_marks.Subject='$subject' AND detail.Grade='$grade' AND detail.Division='$division'";
                        }
                        $result = mysqli_query($link, $sql);
                        if ($result) {
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
                            }?>
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
                            </tr>
                            <?php
                        }
                    }
                    echo '</table>';
                }else{echo 'Invalid format of year';}
            }else {echo 'None of the fields can take an empty value';}
        }else {echo 'All the required fields should be filled';}
        ?>

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
