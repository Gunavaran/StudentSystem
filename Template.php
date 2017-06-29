<!DOCTYPE html>

<html>
<head>

    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type = "text/css" href = "Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>


    <nav id="navigation">
        <ul id="nav">
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="#">Profile</a></li>
            <li> <a href="#">Marks</a></li>
            <li> <a href="#">Attendance</a></li>
            <li> <a href="#">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php echo $content; ?>
    </div>

    <div id="sidebar">

    </div>

    <footer>
        <p> All rights reserved</p></footer>

</div>
</body>
</html>