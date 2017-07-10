<html>
<head>
    <title> View Competition Details</title>
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
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/TermMarksTemplate.php">TermMarks</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <h2>Enter Grade and Term to view the Competition details</h2>
    <form action="compDetail.php" method="GET">
    <!--Year: <br><input type="number" name="year"><br>
    Term: <br><input type="number" name="term"><br>-->
    <br>
Grade:
    <select name="grade">
        <!--<option value="NULL">----</option>-->
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <br>
Term:
    <select name="term">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <br>
    <br><input type="submit" value="Submit">
</form>

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
        echo 'You are directed to competition details of term '.$term.' of '.'grade '.$grade.'<br>';
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
        <h3 class="footer-widget-title">Contact Us</h3>
        <div class="textwidget">
            <p>J/St.John Bosco Vidyalayam,<br/>
                Racca Road, Jaffna.</p>
            <p>Email : stjohnbosco@yahoo.com<br />
                Tel: Principal office: +940212222540</p>
        </div>
        <p align="center" style="font-size: large"><b>All rights reserved</b> </p>
    </footer>

</div>
</body>
</html>