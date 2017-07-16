<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<!DOCTYPE html>

<html>
<head>

    <title>Term Exam Analysis Report</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>
    <style>
        .heading{
            margin-left: 250px;
        }

        form[name = fixedform]{
            float: left;
            width: 100%;
            margin: 20px 10px 0px 0px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: darkgrey;
        }

        input[type=submit]{
            padding: 14px 20px;
            width: 20%;
            margin: 0px 10px 0px 300px;
            background-color: #490c01;
            border-radius: 2px;
            font-style: inherit;
        }

        table, th, td {
            border: 1px darkgrey;
            margin: 10px 10px 0px 0px;
        }
        th, td {
            padding: 8px;
            background: white;
            text-align: left;
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
        <h2 class="heading">Term Analysis Report</h2>
        <form action="../Templates/TermExamAnalysisTemplate.php" name="fixedform">
            <?php
            require '../Connect/Connect.php';
            $message = '';
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
                                $message ="connection failed";
                            }

                            if ($subject == 'all') {
                                $subject_all = ['religion_hin', 'religion_rc', 'tamil', 'mathematics', 'social', 'english'];
                            } else {
                                $subject_all = [$subject];
                            }


                            $username = $_SESSION['username'];
                            $query = "SELECT Role FROM users WHERE username = '$username'";
                            $query_run = mysqli_query($link,$query);
                            $query_row = mysqli_fetch_assoc($query_run);
                            $role = $query_row['Role'];
                            if($role=='sectionalhead' OR $role=='teacher'){
                                $sqli="SELECT grade,division FROM staffuser WHERE username='$username'";
                                $que=mysqli_query($link,$sqli);
                                $que_row=mysqli_fetch_assoc($que);
                                $user_grade=$que_row['grade'];
                                $user_division=$que_row['division'];
                                if($grade!=$user_grade){
                                    $message="You can only view Grade ".$user_grade." students analysis report";
                                }elseif ($user_division!='all' AND $division!=$user_division){
                                    $message="You can only view Grade ".$user_grade." ".$user_division." students analysis report";
                                }
                            }

                            if($message=='') {
                                $head=0;
                                foreach ($subject_all as $subject) {
                                    if ($division == 'all') {
                                        $sql = "SELECT Marks FROM termmarks LEFT JOIN student_details ON termmarks.StudentID=student_details.StudentID WHERE termmarks.Year='$year' AND termmarks.Term=$term AND termmarks.Subject='$subject' AND student_details.Grade='$grade'";
                                    } else {
                                        $sql = "SELECT Marks FROM termmarks LEFT JOIN student_details ON termmarks.StudentID=student_details.StudentID WHERE termmarks.Year='$year' AND termmarks.Term=$term AND termmarks.Subject='$subject' AND student_details.Grade='$grade' AND student_details.Division='$division'";
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

                                            if($head==0){
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
                                                $head=1;
                                            }
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
                                            $message = $message . "No marks entered for " . $subject . '<br><br>';
                                        }
                                    }
                                }
                            }?>
                                </table>
                                <?php
                        }else{$message ='Year should be in range 1991-'.date('Y');}
                    }else{$message ='Year can only be number';}
                }else {$message ='None of the fields can take an empty value';}
            }else {$message ='All the required fields should be filled';}
            ?>
                <div id="message">
                    <?php
                    echo $message
                    ?>
                </div>
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
