<!DOCTYPE html>

<html>
<head>

    <title> Calendar </title>
    <link rel="stylesheet" type = "text/css" href = "Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="Templates/index.php"> Home </a> </li>
            <li> <a href="Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
        require_once "./Connect/Connect.php";
        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            echo "connection failed";
        }
        if (isset($_GET['year'])){
            if(!empty($_GET['year'])) {
                if($_GET['year'] !== (string)(int) $_GET['year']) {
                    echo 'Year can only be integer number'.'<br>';
                }else if((int)$_GET['year']<1990 OR (int)$_GET['year']>date("Y")){
                    echo 'Year should be in range 1991-'.date('Y').'<br>';
                }else{
                    $year=(int)$_GET['year'];
                    $sql = "SELECT * FROM calendar WHERE YEAR(Date)=$year ORDER BY Date";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['Date']." : ".$row['Event'] . '<br>' . '<br>';
                            }
                        }else{
                            echo "No events!!!";
                        }
                    }
                }
            }else{echo 'Year field can not take an empty value';}
        }else {echo 'Year field should be filled';}
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