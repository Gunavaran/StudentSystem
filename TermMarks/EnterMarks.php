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
        <?php
        $message = '';
        echo '<fieldset style="background: darkgray">';
        include "../Connect/Connect.php";
        if (isset($_POST['year']) && isset($_POST['term']) && isset($_POST['subject'])&& isset($_POST['grade'])&& isset($_POST['division'])){
            if (!empty($_POST['year']) && !empty($_POST['term']) && !empty($_POST['subject']) && !empty($_POST['grade']) && !empty($_POST['division'])){
                $username = $_SESSION['username'];
                $query = "SELECT Role FROM users WHERE username = '$username'";
                $query_run = mysqli_query($link,$query);
                $query_row = mysqli_fetch_assoc($query_run);
                $role = $query_row['Role'];

                $term = $_POST['term'];
                $year = $_POST['year'];
                $subject = $_POST['subject'];
                $grade = $_POST['grade'];
                $division = $_POST['division'];

                $_SESSION['year'] = $year;
                $_SESSION['term'] = $term;
                $_SESSION['subject'] = $subject;

                if ($role == 'teacher'){
                    $query = "SELECT grade, division FROM staffuser WHERE username = '$username'";
                    $query_run = mysqli_query($link,$query);
                    $query_row = mysqli_fetch_assoc($query_run);
                    $grade_teacher = $query_row['grade'];
                    $division_teacher = $query_row['division'];

                    if ($grade != $grade_teacher){
                        $message .= "You do not have access to this grade ";
                    } else if ($division != $division_teacher){
                        $message .= "You do not have access to this division";
                    }
                } else if ($role == 'sectionalhead'){
                    $query = "SELECT grade FROM staffuser WHERE username = '$username'";
                    $query_run = mysqli_query($link,$query);
                    $query_row = mysqli_fetch_assoc($query_run);
                    $grade_sectionalhead = $query_row['grade'];

                    if ($grade != $grade_sectionalhead){
                        $message .= "You do not have access to this grade";
                    }
                }

                $sql = "SELECT StudentID FROM student_details WHERE Grade = '$grade' AND Division = '$division'";

                if ($message == ''){
                    $id_array = array();
                    $sql_run = mysqli_query($link, $sql);
                    if ($sql_run->num_rows > 0){
                        while($sql_row = mysqli_fetch_assoc($sql_run)){
                            array_push($id_array,$sql_row['StudentID']);
                        }
                        $_SESSION['id_array']=$id_array;
                        ?>
                        <table style="width: 100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Marks</th>
                            </tr>
                            <?php
                            for ($i=0; $i<sizeof($id_array,1);$i++){
                            ?>
                            <form action="EnterMarks1.php" method="post" name="fixedform">
                                <tr>
                                    <th><?php echo $id_array[$i]; ?></th>
                                    <td><input type="text" name="<?php echo 'marks'.$i; ?>" ></td>
                                </tr>


                                <?php
                                } ?>


                        </table><br><br>
                        <input type="submit" value="Submit">
                        </form>

                        <?php

                    } else {
                        $message = "No data is found";
                    }

                }

            } else{
                $message .= "Fields cannot take empty values";
            }
        }else{
            $message .= "All the required fields should be filled";
        }
        ?>
        <div id="message">
            <?php
            echo $message;
            ?>
        </div>


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
