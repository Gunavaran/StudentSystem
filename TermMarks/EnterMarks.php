<!DOCTYPE html>

<html>
<head>

    <title> Enter Term Marks </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

    <style>
        input[type = text]{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit]{

            padding: 14px 20px;
            width: 100%;
            background-color: #4CAF50;
            border-radius: 2px;
        }

        input[type = date]{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form[name = fixedform]{
            float: left;
            width: 40%;
            margin: 20px 10px 0px 300px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: darkgrey;
        }

        div[id = message]{
            color: crimson;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }

        .heading{
            margin-left: 300px;
        }
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
            border-radius: 5px;
            margin-top: 10px;
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
        <form action="EnterMarks.php" method="post" name="fixedform">



            Year:<br><br>
            <input type="text" name="year"><br><br>
            Term:<br><br>
            <select name='term'>
                <option value = 1>I</option>
                <option value = 2>II</option>
                <option value = 3>III</option>


            </select><br><br>
            Subject:<br><br>
            <select name='subject'>
                <option value = 'religion_hin'>Religion-Hindu</option>
                <option value = 'religion_rc'>Religion-RC</option>
                <option value = 'tamil'>Tamil</option>
                <option value = 'mathematics'>Mathematics</option>
                <option value = 'social'>Social</option>
                <option value = 'english'>English</option>
            </select><br><br>
            ID: <br><br>
            <input type="text" name="id"><br><br>
            Marks:<br><br>
            <input type="text" name="marks"><br><br>

            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $error= 0;

            if (isset($_POST['id']) AND isset($_POST['year'])) {
                if (!empty($_POST['id']) AND !empty($_POST['year'])) {
                    if ($_POST['year'] !== (string)(int)$_POST['year']) {
                        $error++;
                        echo 'Year can only be number' . '<br>';
                    } else if ((int)$_POST['year'] < 1990 OR (int)$_POST['year'] > date("Y")) {
                        $error++;
                        echo 'Year should be in range 1991-' . date('Y') . '<br>';
                    }
                    if (isset($_POST['id'])) {
                        if (!empty($_POST['id'])) {
                            if ($_POST['id'] !== (string)(int)$_POST['id'] AND (int)$_POST['id'] > 0) {
                                $error++;
                                echo "Student ID should be a positive number" . "<br>";
                            } else if (strlen($_POST['id']) != 6) {
                                $error++;
                                echo "Student ID should be in 6 digits</br>";
                            }


                        }

                    }
                    if (isset($_POST['marks'])) {
                        if (!empty($_POST['marks'])) {
                            if ($_POST['marks'] !== (string)(int)$_POST['marks'] AND (int)$_POST['marks'] > 0) {
                                $error++;
                                echo "Marks should be a positive number" . "<br>";
                            } elseif ((int)$_POST['marks'] > 100) {
                                $error++;
                                echo "Marks should be less than or equal to 100";
                            }

                        }
                    }
                    if ($error != 0) {
                        $id = $_POST['id'];
                        $year = $_POST['year'];
                        $subject = $_POST['subject'];
                        $marks = $_POST['marks'];
                        $term = $_POST['term'];

                        $query = "INSERT INTO term_marks (ID, Subject, Marks, Year, Term ) VALUES ('$id', '$subject', '$marks', '$year', '$term')";
                        if ($query_run = mysqli_query($link, $query)) {
                            echo 'Successfully Stored';
                        } else {
                            echo 'Failed!!!';
                        }
                    }
                    else {
                        echo 'None of the fields can take an empty value';
                    }
                }

                    else {
                            echo 'All the required fields should be filled';
                        }
            }





            ?>


        </form>
    </div>

    <div id="sidebar">
        <nav id="competition">
            <ul id="nav">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-bottom: 0px"> <a href="../Templates/CompDetailTemplate.php">Competition Details</a></li>
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

