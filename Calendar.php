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
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
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
                if($_GET['year'] === (string)(int) $_GET['year']){
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
                }else{echo 'Invalid format of year';}
            }else{echo 'Year field can not take an empty value';}
        }else {echo 'Year field should be filled';}
        ?>

    </div>

    <div id="sidebar">

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