<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>


    <html>
<head>

    <title> Update TermMarks</title>
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
        <h2>Enter TermMarks To Be Altered</h2>
        <form action="updateTermMarks.php" method="post" name="fixedform">
            ID: <br>
            <input type="text" name="id"><br><br>
            Subject:<br>
            <select name='subject'>
                <option value = 'religion_hin'>Religion-Hindu</option>
                <option value = 'religion_rc'>Religion-RC</option>
                <option value = 'tamil'>Tamil</option>
                <option value = 'mathematics'>Mathematics</option>
                <option value = 'social'>Social</option>
                <option value = 'english'>English</option>
            </select><br><br>
            Marks:<br>
            <input type="text" name="marks"><br><br>
            Year:<br>
            <input type="text" name="year"><br><br>
            Term:<br>
            <select name='term'>
                <option value = 1>I</option>
                <option value = 2>II</option>
                <option value = 3>III</option>
            </select><br><br>
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
                        if ($_POST['id'] !== (string)(int)$_POST['id'] || (int)$_POST['id'] < 0) {
                            $error++;
                            echo "Student ID should be a positive number" . "<br>";
                        } else if ((strlen($_POST['id']) != 6) || (!is_numeric($_POST['id']))) {
                            $error++;
                            echo "Student ID should be in 6 digits</br>";
                        }

                    }

                }
                if (isset($_POST['marks'])) {
                    if (!empty($_POST['marks'])) {
                        if ($_POST['marks'] != (string)(int)$_POST['marks'] || (int)$_POST['marks'] < 0) {
                            $error++;
                            echo "Marks should be a positive number" . "<br>";
                        } elseif ((int)$_POST['marks'] > 100) {
                            $error++;
                            echo "Marks should be less than or equal to 100";
                        }

                    }
                }
                if ($error==0) {
                    $id = (int)$_POST['id'];
                    $year = $_POST['year'];
                    $subject = $_POST['subject'];
                    $marks = $_POST['marks'];
                    $term = $_POST['term'];

                    $sql_g_d = "SELECT Subject FROM termmarks WHERE StudentID=$id";
                  ///  $quer = mysqli_query($link, $sql_g_d);
                    if (mysqli_query($link, $sql_g_d)) {
                        $quer_row = mysqli_fetch_assoc($quer);
                        $grade = $quer_row['grade'];
                        $division = $quer_row['division'];


                        $username = $_SESSION['username'];
                        $query = "SELECT Role FROM users WHERE username = '$username'";
                        $query_run = mysqli_query($link, $query);
                        $query_row = mysqli_fetch_assoc($query_run);
                        $role = $query_row['Role'];

                        if ($role == 'teacher') {
                            $sqli = "SELECT grade,division FROM staffuser WHERE username='$username'";
                            $que = mysqli_query($link, $sqli);
                            $que_row = mysqli_fetch_assoc($que);
                            $user_grade = $que_row['grade'];
                            $user_division = $que_row['division'];
                            if ($grade != $user_grade OR $division != $user_division) {
                                $message = "You can only update marks for Grade " . $user_grade . " " . $user_division . " students";
                            }
                        }
                    } else {
                        $error++;
                        echo "The index number does not exist";
                    }
                }

                if ($error==0) {
                    $id = $_POST['id'];
                    $subject = $_POST['subject'];
                    $marks = $_POST['marks'];
                    $year = $_POST['year'];
                    $term = $_POST['term'];

                    $query = "UPDATE termmarks SET Marks = '$marks' WHERE ID = '$id' AND Subject = '$subject' AND Year = '$year' AND Term ='$term'";
                    if (mysqli_query($link, $query)) {
                        echo 'Update Successful';
                    } else {
                        echo 'Update Failed!!!';
                    }
                }

            } else {
                echo 'None of the fields can take an empty value';
            }


        } else {
            echo 'All the required fields should be filled';
        }

        ?>
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
