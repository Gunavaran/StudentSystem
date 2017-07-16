<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>
<!DOCTYPE html>

<html>
<head>

    <title>Student Detail </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        form[name = fixedform]{
            float: left;
            width: 60%;
            margin: 20px 10px 0px 200px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: darkgrey;
        }

        input[type=submit]{
            padding: 14px 20px;
            width: 20%;
            margin: 0px 10px 0px 180px;
            background-color: #490c01;
            border-radius: 2px;
            font-style: inherit;
        }

        div[id = message]{
            color: crimson;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }

        div[id = message_1]{
            color: #000000;
            margin-top: 10px;
            padding: 10px 20px;
            width: auto ;
            border-radius: 2px;
        }

        div[id = message_2]{
            color: #7a0a0c;
            margin-top: 10px;
            padding: 0px 20px 20px;
            width: auto ;
            border-radius: 2px;
        }

        .heading{
            margin-left: 325px;
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
        <h2 class="heading">Student Detail</h2>
            <?php
            require '../Connect/Connect.php';
            $message = '';
            if ($link || mysqli_select_db($link,$database)){
                //echo "Connection successful;";
            } else {
                $message = "connection failed";
            }
            $username = $_SESSION['username'];
            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student') {
                ?><form action="../Templates/ViewDetailTemplate.php" name="fixedform"><?php
                if (!isset($_GET['id'])) {
                    $message ='All the required fields should be filled';
                }else if (empty($_GET['id'])) {
                    $message ='None of the fields can take an empty value';
                }else if ($_GET['id'] !== (string)(int)$_GET['id']) {
                    $message = "StudentID can only be numbers";
                }else if ((int)$_GET['id']<0) {
                        $message ="StudentID can only be positive number";
                }else if (strlen($_GET['id']) != 6) {
                    $message ="Length of StudentID should be 6";
                }else{
                    $id = $_GET['id'];
                }
            }else{
            ?><form action="../Templates/ProfileTemplate.php" name="fixedform"><?php
                $id = $_SESSION['username'];
            }
            if($message == ''){
                $sql = "SELECT * FROM student_details WHERE StudentID=$id";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        extract($row);
                        if($role=='sectionalHead' OR $role=='teacher'){
                            $sqli="SELECT grade,division FROM staffuser WHERE username='$username'";
                            $que=mysqli_query($link,$sqli);
                            $que_row=mysqli_fetch_assoc($que);
                            $user_grade=$que_row['grade'];
                            $user_division=$que_row['division'];
                            if($row["Grade"]!=$user_grade){
                                $message="You can only view Grade ".$user_grade." students detail";
                            }elseif ($user_division!='all' AND $row["Division"]!=$user_division){
                                $message="You can only view Grade ".$user_grade." ".$user_division." students detail";
                            }
                        }
                        if($message == '') {
                            ?>

                            <div id="message_1">
                                Student ID:
                                <div id="message_2"> <?php echo $row["StudentID"]; ?> </div>
                                First Name:
                                <div id="message_2"> <?php echo $row["FirstName"]; ?> </div>
                                Last Name:
                                <div id="message_2"> <?php echo $row["LastName"]; ?> </div>
                                Grade:
                                <div id="message_2"> <?php echo $row["Grade"]; ?> </div>
                                Division:
                                <div id="message_2"> <?php echo $row["Division"]; ?> </div>
                                Address:
                                <div id="message_2"> <?php echo $row["Address"]; ?> </div>
                                DOB:
                                <div id="message_2"> <?php echo $row["DOB"]; ?> </div>
                                email:
                                <div id="message_2"> <?php echo $row["email"]; ?> </div>
                                Telephone No:
                                <div id="message_2"> <?php echo $row['Telephone']; ?> </div>
                                Father's Name:
                                <div id="message_2"> <?php echo $row["FatherName"]; ?> </div>
                                Father's Job:
                                <div id="message_2"> <?php echo $row["FatherJob"]; ?> </div>
                                Mother's Name:
                                <div id="message_2"> <?php echo $row["MotherName"]; ?> </div>
                                Mother's Job:
                                <div id="message_2"> <?php echo $row["MotherJob"]; ?> </div>
                            </div>
                            <?php
                        }
                    } else {$message ="Please check your Student ID...No details were found!!!";}
                } else {$message ="Please check your Student ID...No details were found!!!";}
            }
            ?>
            <div id="message">
                <?php
                echo $message;
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