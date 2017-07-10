<!DOCTYPE html>

<html>
<head>

    <title> Character Certificate </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

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
        <?php
        require '../Connect/Connect.php';
        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            echo "Connection failed";
        }

        $error=0;
        $username = $_SESSION['username'];
        $query = "SELECT Role FROM user WHERE username = '$username'";
        $query_run = mysqli_query($link,$query);
        $query_row = mysqli_fetch_assoc($query_run);
        $role = $query_row['Role'];
        if ($role != 'student') {
            if (!isset($_GET['id'])) {
                $error=1;
                echo 'All the required fields should be filled';
            }else if (empty($_GET['id'])) {
                $error=1;
                echo 'None of the fields can take an empty value';
            }else if ($_GET['id'] !== (string)(int)$_GET['id']) {
                $error=1;
                echo "StudentID can only be numbers";
            }else if (strlen($_GET['id']) != 6) {
                $error=1;
                echo "Length of StudentID should be 6";
            }else{
                $id = $_GET['id'];
            }
        }else{
            $id = $_SESSION['username'];
        }
        if($error==0){
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
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $character = $row['Character_detail'];
                        echo $character . '<br/>';
                    }
                }
            }
            echo 'Good Student';
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
