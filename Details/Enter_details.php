<?php
include "../Log_in_out/core.php";
if (logged_in()) {
?>

<!DOCTYPE html>

<html>
<head>

    <title> Enter Details </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>

        select{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
        }

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
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="Enter_details.php" method="post" name="fixedform">
            ID: <br>
            <input type="text" name="id"><br><br>
            First Name:<br>
            <input type="text" name="FirstName"><br><br>
            Last Name:<br>
            <input type="text" name="LastName"><br><br>
            Grade:<br>
            <select name='grade'>
                <option value = '01'>01</option>
                <option value = '02'>02</option>
                <option value = '03'>03</option>
                <option value = '04'>04</option>
                <option value = '05'>05</option>
            </select><br><br>
            Division:<br>
            <select name='division'>
                <option value = 'A'>A</option>
                <option value = 'B'>B</option>
                <option value = 'C'>C</option>
                <option value = 'D'>D</option>
                <option value = 'E'>E</option>
            </select><br><br>
            Address:<br>
            <input type="text" name="Address"><br><br>
            Phone:<br>
            <input type="text" name="PhoneNumber"><br><br>
            Date Of Birth:<br>
            <input type="date" name="DateOfBirth"><br><br>
            Email:<br>
            <input type="text" name="Email"><br><br>
            Father's Name:<br>
            <input type="text" name="FatherName"><br><br>
            Father's Job:<br>
            <input type="text" name="FatherJob"><br><br>
            Mother's Name:<br>
            <input type="text" name="MotherName"><br><br>
            Mother's Job:<br>
            <input type="text" name="MotherJob"><br><br>
            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';

            if (isset($_POST['id']) && isset($_POST['FirstName']) && isset($_POST['LastName'])&& isset($_POST['Address'])&& isset($_POST['PhoneNumber'])&& isset($_POST['Email'])&& isset($_POST['FatherName'])&& isset($_POST['FatherJob'])&& isset($_POST['MotherJob'])&& isset($_POST['DateOfBirth'])&& isset($_POST['MotherName']) && isset($_POST['grade'])&& isset($_POST['division']) ){
                if(!empty($_POST['id']) && !empty($_POST['FirstName']) && !empty($_POST['LastName'])&& !empty($_POST['Email'])&& !empty($_POST['Address'])&& !empty($_POST['PhoneNumber'])&& !empty($_POST['FatherName'])&& !empty($_POST['FatherJob'])&& !empty($_POST['MotherJob'])&& !empty($_POST['MotherName'])&& !empty($_POST['DateOfBirth'])&& !empty($_POST['grade'])&& !empty($_POST['division'])){
                    $error=0;
                    $today= date_create(date('Y-m-d'));
                    $thisyear=$today->format('Y');
                    $date=($_POST['DateOfBirth']);
                    $enterYear= date('Y',strtotime($date));


                    if ($_POST['PhoneNumber'] != (string)(int)$_POST['PhoneNumber'] AND (int)$_POST['PhoneNumber'] < 0) {
                        $error++;
                        echo "Phone Number should be a positive number" . "<br>";
                    } else if (strlen($_POST['PhoneNumber']) != 10) {
                        $error++;
                        echo "phone Number should be in 10 digits</br>";
                    } else if ($_POST['id'] != (string)(int)$_POST['id'] AND (int)$_POST['id'] < 0) {
                        $error++;
                        echo "Student ID should be a positive number" . "<br>";
                    } else if (strlen($_POST['id']) != 6 && (!is_numeric($_POST['id']))) {
                        $error++;
                        echo "Student ID should be in 6 digits</br>";
                    } else if (!ctype_alpha($_POST['FirstName'])) {
                        $error++;
                        echo "First Name should contains only alphaphets" . "<br>";
                    } else if (!ctype_alpha($_POST['LastName'])) {
                        $error++;
                        echo "Last Name should contains only alphaphets" . "<br>";
                    } else if (!ctype_alpha($_POST['FatherName'])) {
                        $error++;
                        echo "Father's Name should contains only alphaphets" . "<br>";
                    } else if (!ctype_alpha($_POST['MotherName'])) {
                        $error++;
                        echo "Mother's Name should contains only alphaphets" . "<br>";
                    } else if (!ctype_alpha($_POST['FatherJob'])) {
                        $error++;
                        echo "Father's Job should contains only alphaphets" . "<br>";
                    } else if (!ctype_alpha($_POST['MotherJob'])) {
                        $error++;
                        echo "Mother's Job should contains only alphaphets" . "<br>";
                    } else if(((int)$thisyear-((int)$enterYear))<5 || (((int)$thisyear-((int)$enterYear))>12)) {
                        $error++;
                        echo "Please enter correct Date of Birth"."<br>";
                    }
                    else{



                        $id = $_POST['id'];
                        $first = $_POST['FirstName'];
                        $last = $_POST['LastName'];
                        $add = $_POST['Address'];
                        $mail = $_POST['Email'];
                        $phone = $_POST['PhoneNumber'];
                        $fatherName = $_POST['FatherName'];
                        $fatherJob = $_POST['FatherJob'];
                        $motherName = $_POST['MotherName'];
                        $motherJob = $_POST['MotherJob'];
                        $dob = $_POST['DateOfBirth'];
                        $grade = $_POST['grade'];
                        $division = $_POST['division'];

                        $query = "INSERT INTO student_details (StudentID, FirstName, LastName, Address, Telephone, email, FatherName, FatherJob, MotherName, MotherJob, DOB, Grade, Division ) VALUES ('$id', '$first', '$last', '$add', '$phone','$mail','$fatherName','$fatherJob','$motherName','$motherJob','$dob','$grade','$division')";
                        $query_users = "INSERT INTO users (username, password, Role) VALUES ('$id', md5('pass123'), 'student')";
                        if ($query_run = mysqli_query($link, $query) && $query_users_run = mysqli_query($link, $query_users)){
                            echo 'Successfully Stored';
                        } else {
                            echo 'Failed!!!';
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

