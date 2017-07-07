<!DOCTYPE html>

<html>
<head>

    <title> Character Certificate </title>
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
            <li> <a href="#">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
        require 'Connect/Connect.php';
        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            echo "connection failed";
        }

        if (isset($_GET['id'])) {
            if(!empty($_GET['id'])) {
                if($_GET['id'] === (string)(int) $_GET['id'] AND strlen($_GET['id'])==1) {
                    $id = $_GET['id'];
                    $sql = "SELECT First_name,Last_name,Grade FROM `detail` WHERE ID=$id";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $first = $row['First_name'];
                            $last = $row['Last_name'];
                            $grade = $row['Grade'];
                            echo "First Name: " . '<br/>' . $first . '<br/><br>';
                            echo "Last Name: " . '<br/>' . $last . '<br/><br>';
                            echo "Grade: " . '<br/>' . $grade . '<br/><br>';
                        }
                    } else {
                        echo "No data has been found";
                    }
                    echo "Character Detail: " . '<br/>';
                    $sql = "SELECT Character_detail FROM `character` WHERE ID=$id";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $character = $row['Character_detail'];
                            echo $character . '<br/>';
                        }
                    }
                }else {echo 'Invalid format of Student ID';}
            }else {echo 'None of the fields can take an empty value';}
        }else {echo 'All the required fields should be filled';}
        ?>
    </div>
    <div id="sidebar">

    </div>

    <footer>
        <p> All rights reserved</p></footer>

</div>
</body>
</html>
