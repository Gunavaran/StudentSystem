<!DOCTYPE html>

<html>
<head>

    <title> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
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
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <form action="addStaff.php" method="post" name = 'fixedform'>
            Username: <br>
            <input type="text" name="username"><br><br>
            Role:<br>
            <select name="role">
                <option value="teacher">Teacher</option>
                <option value="principal">Principal</option>
                <option value="viceprincipal">Vice Principal</option>
                <option value="sectionalhead">Sectional Head</option>

            </select><br><br>
            Grade: <br>
            <select name="grade">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="all">All</option>

            </select><br><br>
            Division: <br>
            <select name="division">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="all">All</option>

            </select><br><br>
            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $message = '';
            if (isset($_POST['username']) && isset($_POST['role'])) {
                if (!empty($_POST['username']) && !empty($_POST['role'])){
                    $name = $_POST['username'];
                    $role = $_POST['role'];
                    $grade = $_POST['grade'];
                    $division = $_POST['division'];
                    $query = "INSERT INTO users (username, password, Role) VALUES ('$name',md5('pass123'),'$role')";
                    $query_staff = "INSERT INTO staffuser (username, grade ,division, role) VALUES ('$name', '$grade','$division', '$role')";
                    if ($role == 'sectionalhead' && $division != 'all'){
                        $message = 'Division should be selected as "all" for Sectional Head ';
                    } else if($role == 'viceprincipal' && $division != 'all' && $grade != 'all'){
                        $message = "Division and Grade should be selected as 'all' for Vice Principal";
                    } else if($role == 'teacher' && $division == 'all'){
                        $message = "Division cannot be selected as 'all' for Teacher";
                    } else if($role == 'teacher' && $grade == 'all'){
                        $message = "Grade cannot be selected as 'all' for Teacher";
                    } else if (mysqli_query($link, $query) && mysqli_query($link, $query_staff)){
                        $message = "Stored Successfully";
                    } else {
                        $message = "Submit failed!!!";
                    }

                } else {
                    $message = "Fields cannot take empty values. Submit FAiled!!!";
                }

            } else {
                $message = "Required fields cannot be empty. Submit Failed!!!";
            }
            ?>

            <div id="message">
                <?php
                echo $message;
                ?>
            </div>

        </form>
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
