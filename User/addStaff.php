<!DOCTYPE html>

<html>
<head>

    <title> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
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
        <form action="addStaff.php" method="post" class="form">
            Username: <br>
            <input type="text" name="username"><br><br>
            Role:<br>
            <select>
                <option value="classteacher">ClassTeacher</option>
                <option value="englishteacher">EnglishTeacher</option>
            </select><br><br>
            Grade: <br>
            <input type="text" name="grade"><br><br>
            Division: <br>
            <input type="text" name="division"><br><br>
            <input type="submit" value="Submit">

            <?php
            include '../Connect/Connect.php';
            $message = '';
            if (isset($_POST['username']) && isset($_POST['role'])) {
                if (!empty($_POST['username']) && !empty($_POST['role'])){
                    $name = $_POST['username'];
                    $role = $_POST['role'];
                    $query = "INSERT INTO users (username, password, Role) VALUES ('$name',md5('pass123'),'$role')";
                    if(mysqli_query($link, $query)){
                        $message = "Stored Successfully";
                    } else {
                        $message = "Submit failed!!!";
                    }

                }

            }
            ?>

            <div id="message">
                <?php
                echo $message
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
