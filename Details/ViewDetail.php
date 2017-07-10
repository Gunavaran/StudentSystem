<!DOCTYPE html>

<html>
<head>

    <title>Student Detail </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="index.php"> Home </a> </li>
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="MarksTemplate.php">Marks</a></li>
            <li> <a href="attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
        require '../Connect/Connect.php';
        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            echo "connection failed";
        }
        if (isset($_POST['id'])) {
            if(!empty($_POST['id'])) {
                if($_POST['id'] === (string)(int) $_POST['id'] AND strlen($_POST['id'])==6) {
                    $id = $_POST['id'];
                    $sql = "SELECT * FROM student_details WHERE StudentID='$id'";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo "Student ID: " . $row["StudentID"] . '<br>' . '<br>';
                            echo "First Name: " . $row["FirstName"] . '<br>' . '<br>';
                            echo "Last Name: " . $row["LastName"] . '<br>' . '<br>';
                            echo "Grade: " . $row["Grade"] . '<br>' . '<br>';
                            echo "Division: " . $row["Division"] . '<br>' . '<br>';
                            echo "Address: " . $row["Address"] . '<br>' . '<br>';
                            echo "DOB: " . $row["DOB"] . '<br>' . '<br>';
                            echo "email: " . $row["email"] . '<br>' . '<br>';
                            echo "Telephone No: " . $row['Telephone'] . '<br>' . '<br>';
                        } else {
                            echo "Please check your Student ID...No details were found!!!";
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
