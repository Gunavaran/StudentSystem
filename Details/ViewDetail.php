<!DOCTYPE html>

<html>
<head>

    <title>Student Detail </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

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
        <?php
        require '../Connect/Connect.php';
        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            echo "connection failed";
        }
        include '../Connect/Connect.php';
        $error=0;
        $username = $_SESSION['username'];
        $query = "SELECT Role FROM user WHERE username = '$username'";
        $query_run = mysqli_query($link,$query);
        $query_row = mysqli_fetch_assoc($query_run);
        $role = $query_row['Role'];
        if ($role != 'student') {
            if (!isset($_GET['id'])) {
                $error=1;
                echo 'All the required fields should be filled';
            }else if (empty($_GET['id'])) {
                $error=1;
                echo 'None of the fields can take an empty value';
            }else if ($_GET['id'] !== (string)(int)$_GET['id']) {
                $error=1;
                echo "StudentID can only be numbers";
            }else if (strlen($_GET['id']) != 6) {
                $error=1;
                echo "Length of StudentID should be 6";
            }else{
                $id = $_GET['id'];
            }
        }else{
            $id = $_SESSION['username'];
        }
        if($error==0){
            $sql = "SELECT * FROM detail WHERE ID=$id";
            $result = mysqli_query($link, $sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "Student ID: " . $row["ID"] . '<br>' . '<br>';
                    echo "First Name: " . $row["First_name"] . '<br>' . '<br>';
                    echo "Grade: " . $row["Grade"] . '<br>' . '<br>';
                    echo "Division: " . $row["Division"] . '<br>' . '<br>';
                    echo "Address: " . $row["Address"] . '<br>' . '<br>';
                    echo "DOB: " . $row["DOB"] . '<br>' . '<br>';
                    echo "email: " . $row["email"] . '<br>' . '<br>';
                    echo "Telephone No: " . $row['Telephone'] . '<br>' . '<br>';
                } else {
                    echo "Please check your Student ID...No details were found!!!";
                }
            }
        }
        ?>
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
