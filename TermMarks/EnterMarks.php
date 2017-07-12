<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <!DOCTYPE html>

<html>
<head>

    <title> Enter Term Marks </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

    <?php
    include "../Styles/FormStyle.html";
    ?>

    <style>
        select{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
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
            <li> <a href="../Templates/TermMarksTemplate.php">TermMarks</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="EnterMarks.php" method="get" name="fixedform">



            Year:<br>
            <input type="text" name="year"><br><br>
            Term:<br>
            <select name='term'>
                <option value = 1>I</option>
                <option value = 2>II</option>
                <option value = 3>III</option>
            </select><br><br>

            Subject:<br>
            <select name='subject'>
                <option value = 'religion_hin'>Religion-Hindu</option>
                <option value = 'religion_rc'>Religion-RC</option>
                <option value = 'tamil'>Tamil</option>
                <option value = 'mathematics'>Mathematics</option>
                <option value = 'social'>Social</option>
                <option value = 'english'>English</option>
            </select><br><br>

            ID: <br>
            <input type="text" name="id"><br><br>

            Marks:<br>
            <input type="text" name="marks"><br><br>

            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $message='';

            if (isset($_GET['id']) AND isset($_GET['year'])) {
                if (!empty($_GET['id']) AND !empty($_GET['year'])) {
                    if ($_GET['year'] !== (string)(int)$_GET['year']) {
                        $message='Year can only be number' . '<br>';
                    } else if ((int)$_GET['year'] < 1990 OR (int)$_GET['year'] > date("Y")) {
                        $message='Year should be in range 1991-' . date('Y') . '<br>';
                    }

                    if (isset($_GET['id'])) {
                        if (!empty($_GET['id'])) {
                            if ($_GET['id'] !== (string)(int)$_GET['id'] AND (int)$_GET['id'] > 0) {
                                $message=$message."Student ID should be a positive number" . "<br>";
                            } else if (strlen($_GET['id']) != 6) {
                                $message=$message."Student ID should be in 6 digits</br>";
                            }
                        }
                    }

                    if (isset($_GET['marks'])) {
                        if (!empty($_GET['marks'])) {
                            if ($_GET['marks'] !== (string)(int)$_GET['marks'] AND (int)$_GET['marks'] > 0) {
                                $message=$message."Marks should be a positive number" . "<br>";
                            } elseif ((int)$_GET['marks'] > 100) {
                                $message=$message."Marks should be less than or equal to 100";
                            }

                        }
                    }

                    if ($message=='') {
                        $id = (int)$_GET['id'];
                        $year = $_GET['year'];
                        $subject = $_GET['subject'];
                        $marks = $_GET['marks'];
                        $term = $_GET['term'];

                        $sql_g_d="SELECT grade,division FROM student_details WHERE StudentID=$id";
                        $quer=mysqli_query($link,$sql_g_d);
                        if($quer->num_rows>0) {
                            $quer_row = mysqli_fetch_assoc($quer);
                            $grade = $quer_row['grade'];
                            $division = $quer_row['division'];


                            $username = $_SESSION['username'];
                            $query = "SELECT Role FROM users WHERE username = '$username'";
                            $query_run = mysqli_query($link,$query);
                            $query_row = mysqli_fetch_assoc($query_run);
                            $role = $query_row['Role'];

                            if($role=='teacher'){
                                $sqli="SELECT grade,division FROM staffuser WHERE username='$username'";
                                $que=mysqli_query($link,$sqli);
                                $que_row=mysqli_fetch_assoc($que);
                                $user_grade=$que_row['grade'];
                                $user_division=$que_row['division'];
                                if($grade!=$user_grade OR $division!=$user_division){
                                    $message="You can only enter marks for Grade ".$user_grade." ".$user_division." students";
                                }
                            }
                        }else{
                            $message='Index number does not exist';
                        }

                        if($message=='') {
                            $query = "INSERT INTO term_marks (ID, Subject, Marks, Year, Term ) VALUES ('$id', '$subject', '$marks', '$year', '$term')";
                            if (mysqli_query($link, $query)) {
                                $message = 'Successfully Stored';
                                if ($marks < 35) {
                                    $notiquery = "INSERT INTO notify_marks (StudentID, Subject) VALUES ('$id', '$subject')";
                                    $notiquery_run = mysqli_query($link, $notiquery);
                                }
                            } else {
                                $message = 'Failed!!!';
                            }
                        }
                    }
                } else {
                    $message='None of the fields can take an empty value';
                }

            }
            else {
                $message='All the required fields should be filled';
            }

            ?>
            <div id="message">
                <?php
                echo $message
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
