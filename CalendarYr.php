<!DOCTYPE html>

<html>
<head>

    <title>Calendar</title>
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
        <form action="Calendar.php" method="get">
            <fieldset>
                <label>Enter Year:</label><br><br>
                <input type="text" name="year" placeholder="Year"><br><br><br>
                <button type="submit">Submit</button>
            </fieldset>
        </form>

    </div>

    <div id="sidebar">

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