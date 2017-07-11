<html>
<head>
    <title> Competition Details</title>
    <link rel="stylesheet" type = "text/css" href = "Styles/stylesheets.css"/>
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
            <li><a href="Templates/index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
<?php
if (isset($_GET['grade'])&& isset($_GET['term'])){
    $grade=$_GET['grade'];
    $term=$_GET['term'];
    if(empty($grade)&&empty($term)){
        echo 'Please enter grade and term';
    }elseif (empty($grade)){
        echo 'Please enter grade';
    }elseif (empty($term)){
        echo 'Please enter term';
    }else{
        echo 'Competition Details of term '.$term.' of '.'grade '.$grade.' are as follows.<br>';
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'studentsystem';

        $link= mysqli_connect($host,$username,$password,$database) or die ("could not connect");

        $query = "SELECT * FROM competitions WHERE Term ='$term' AND Grade=$grade";
        $query_run = mysqli_query($link,$query);
        if (mysqli_num_rows($query_run) == NULL){
            echo "Competition details not available";
        } else {
            while($query_row = mysqli_fetch_assoc($query_run)){
                $competition = $query_row['Competition'];
                echo $competition.'<br/>';
            }
        }
    }
}
?>
</div>
    <div id="sidebar">
        <nav id="competition">
            <ul id="nav">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-bottom: 0px"> <a href="Templates/CompDetailTemplate.php">Competition Details</a></li>
            </ul>
        </nav>

        <nav id="competition" style="margin-top: 0px; padding-top: 0px">
            <ul id="nav" style="margin-top: 0px">
                <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 20px"> <a href="Calendar.php">School Calendar</a></li>
            </ul>
        </nav>

        <?php
        session_start();
        $username = $_SESSION['username'];

        if ($username == 'principal'){
            ?>

            <nav id="competition" style="margin-top: 0px; padding-top: 0px">
                <ul id="nav" style="margin-top: 0px">
                    <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 45px"> <a href="User/addStaff.php">Add Staff</a></li>
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
