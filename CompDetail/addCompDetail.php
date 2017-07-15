<?php
session_start();
?>
<html>
<head>
    <title>Add Competition Details</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        nav[id=competition]{
            background-color: mediumorchid;
            height:60px;
            border-radius: 5px;
            margin-top: 10px;
        }
        div [id = resultbar]{
            float: left;
            width: 40%;
            margin: 20px 10px 0px 300px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: #E3E3E3;
        }
        nav[id=ok]{
            padding: 14px 20px;
            width: auto;
            background-color: #4CAF50;
            border-radius: 2px;
            height:35px;
            text-align: left;

        }

        div[id=heading]{
            color: darkblue;
            font-size: x-large;
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
        <div id="resultbar">
            <?php
            if (isset($_GET['competition'])&& !empty($_GET['competition'])){
                $grade=$_GET['grade'];
                $term=$_GET['term'];
                $competition=$_GET['competition'];

                require '../Connect/Connect.php';
                $query = "INSERT INTO `competitions` (Grade,Term,Competition) VALUES ('$grade','$term','$competition')";
               // $query_run = mysqli_query($link,$query);
                if(mysqli_query($link,$query)){
                    echo "Competition Detail added successfully";
                }else{
                    echo "Failed";
                }
            }else{
                echo 'Please fill all the fields';
            }
            ?>
            <nav id="ok" style="margin-top: 0px; padding-top: 0px">
                <ul id="nav" style="margin-top: 0px">
                    <li id = 'compLine' style="font-size: 20px; margin-top: 15px; margin-left: 70px"> <a href="../Templates/AddCompDetailTemplate.php"> OK </a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>
</div>
</body>
</html>
