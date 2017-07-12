<?php
session_start();
?>
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
            <li> <a href="Templates/ProfileTemplate.php">Profile</a></li>
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
    <?php
    include 'Styles/SidebarStyle.html';
    include 'Styles/FooterStyle.html';
    ?>
</div>
</body>
</html>
