<!DOCTYPE html>

<html>
<head>

    <title> Character Certificate </title>
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
            padding: 20px 20px;
            width: auto ;
            border-radius: 2px;
        }

        div[id = message_2]{
            color: #7a0a0c;
            margin-top: 0px;
            padding: 10px 20px;
            width: auto ;
            border-radius: 2px;
        }

        input[type=submit]{
            padding: 14px 20px;
            width: 20%;
            margin: 0px 10px 0px 180px;
            background-color: #490c01;
            border-radius: 2px;
            font-style: inherit;
        }

        .heading{
            margin-left: 300px;
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
        <h2 class="heading">Character Certificate</h2>
        <form action="../Templates/CharacterTemplate.php" name="fixedform">
            <?php
            require '../Connect/Connect.php';
            $message = '';
            if ($link || mysqli_select_db($link,$database)){
                //echo "Connection successful;";
            } else {
                $message ="Connection failed";
            }


            $username = $_SESSION['username'];
            $query = "SELECT Role FROM user WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student') {
                if (!isset($_GET['id'])) {
                    $message ='All the required fields should be filled';
                }else if (empty($_GET['id'])) {
                    $message ='None of the fields can take an empty value';
                }else if ($_GET['id'] !== (string)(int)$_GET['id'] OR (int)$_GET['id']<0) {
                    $message ="StudentID can only be a positive numbers";
                }else if (strlen($_GET['id']) != 6) {
                    $message ="Length of StudentID should be 6";
                }else{
                    $id = (int)$_GET['id'];
                }
            }else{
                $id = $_SESSION['username'];
            }
            if($message == ''){
                $sql = "SELECT First_name,Last_name,Grade FROM `detail` WHERE ID=$id";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $first = $row['First_name'];
                        $last = $row['Last_name'];
                        $grade = $row['Grade'];

                        echo '<div id="message_1">'."First Name: ".'<div id="message_2">'.$first.'</div>';
                        echo "Last Name: ".'<div id="message_2">'.$last.'</div>';
                        echo "Grade: ".'<div id="message_2">'.$grade.'</div>';
                    }
                } else {
                    $message ="No data has been found";
                }
                echo "Character Detail: ";
                $sql = "SELECT Character_detail FROM `character` WHERE ID=$id";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    if (mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $character = $row['Character_detail'];
                            echo '<div id="message_2">';
                            echo $character;
                            echo '</div>';
                        }
                    }
                }
                echo '<div id="message_2">';
                echo 'Good Student';
                echo '</div>'.'</div>';
            }
            ?>
            <div id="message">
                <?php
                echo $message
                ?>
            </div>
            <input type="submit" value="OK" style="color: #ffffff">
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
