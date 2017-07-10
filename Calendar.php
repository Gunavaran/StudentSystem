<!DOCTYPE html>

<html>
<head>

    <title> Calendar </title>
    <link rel="stylesheet" type = "text/css" href = "Styles/stylesheets.css"/>
    <style>

        input[type=submit]{
            padding: 14px 20px;
            width: 20%;
            margin: 0px 10px 0px 180px;
            background-color: #490c01;
            border-radius: 2px;
            font-style: inherit;
        }

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

        div[id = message_2]{
            color: #7a0a0c;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }

        div[id = message_1]{
            color: #000000;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }

        div[id = message]{
            color: crimson;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }

        .heading{
            margin-left: 200px;
        }

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
        <h2 class="heading">School Calendar</h2>
        <form action="CalendarYr.php" name="fixedform">
        <?php
        require_once "./Connect/Connect.php";
        $message = '';
        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            $message="connection failed";
        }
        if (isset($_GET['year'])){
            if(!empty($_GET['year'])) {
                if($_GET['year'] !== (string)(int) $_GET['year']) {
                    $message='Year can only be integer number'.'<br>';
                }else if((int)$_GET['year']<1990 OR (int)$_GET['year']>date("Y")){
                    $message='Year should be in range 1991-'.date('Y').'<br>';
                }else{
                    $year=(int)$_GET['year'];
                    $sql = "SELECT * FROM calendar WHERE YEAR(Date)=$year ORDER BY Date";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div id="message_1">';
                                echo $row['Date']." : ".'<div id="message_2">'.$row['Event'].'</div>'.'</div>';
                            }
                        }else{
                            $message="No events!!!";
                        }
                    }
                }
            }else{$message='Year field can not take an empty value';}
        }else {$message='Year field should be filled';}
        ?>
        <div id="message">
            <?php
            echo $message.'<br>';
            ?>
            <input type="submit" value="OK" style="color: #ffffff">
        </div>
        </form>
    </div>

    <?php
    include 'Styles/SidebarStyle.html';
    include 'Styles/FooterStyle.html';
    ?>

</div>
</body>
</html>