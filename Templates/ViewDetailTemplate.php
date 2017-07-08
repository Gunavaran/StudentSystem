<!DOCTYPE html>

<html>
<head>

    <title> View Student Detail </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="ProfileTemplate.php">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
            include '../Connect/Connect.php';
            $username = $_SESSION['username'];
            $query = "SELECT Role FROM users WHERE username = '$username'";
            $query_run = mysqli_query($link,$query);
            $query_row = mysqli_fetch_assoc($query_run);
            $role = $query_row['Role'];
            if ($role != 'student') {
                ?>
                <form action="../Details/ViewDetail.php" method="get">
                    <fieldset>
                        <label>Enter Student ID</label><br><br>
                        <input type="text" name="id" placeholder="Student ID"><br><br><br>
                        <button type="submit">Submit</button>
                    </fieldset>
                </form>
                <?php
            }else{
                include '../Details/ViewDetail.php';
            }
        ?>

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
