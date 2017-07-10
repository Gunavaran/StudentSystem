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
        <form action="../Templates/ViewDetailTemplate.php" name="fixedform">
            <?php
            require '../Connect/Connect.php';
            $message = '';
            if ($link || mysqli_select_db($link,$database)){
                //echo "Connection successful;";
            } else {
                $message = "connection failed";
            }
            include '../Connect/Connect.php';
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
                }else if ($_GET['id'] !== (string)(int)$_GET['id']) {
                    $message ="StudentID can only be numbers";
                }else if (strlen($_GET['id']) != 6) {
                    $message ="Length of StudentID should be 6";
                }else{
                    $id = $_GET['id'];
                }
            }else{
                $id = $_SESSION['username'];
            }
            if($message == ''){
                $sql = "SELECT * FROM detail WHERE ID=$id";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        extract($row); ?>
                        <div id="message_1">
                            Student ID:<div id="message_2"> <?php echo $row["ID"];?> </div>
                            First Name:<div id="message_2"> <?php echo $row["First_name"];?> </div>
                            Grade:<div id="message_2"> <?php echo $row["Grade"];?> </div>
                            Division:<div id="message_2"> <?php echo $row["Division"];?> </div>
                            Address:<div id="message_2"> <?php echo $row["Address"];?> </div>
                            DOB:<div id="message_2"> <?php echo $row["DOB"];?> </div>
                            email:<div id="message_2"> <?php echo $row["email"];?> </div>
                            Telephone No:<div id="message_2"> <?php echo $row['Telephone'];?> </div>
                        </div>
                    <?php } else {
                        $message ="Please check your Student ID...No details were found!!!";
                    }
                }
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
