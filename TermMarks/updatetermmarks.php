<html>
<head>

    <title> Update TermMarks</title>
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
            <li> <a href="../Templates/TermMarksTemplate.php">TermMarks</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <h2>Enter TermMarks To Be Altered</h2>
        <form action="updateTermMarks.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="ID"><br><br>
            Subject:<br><br>
            <select name='subject'>
                <option value = 'religion_hin'>Religion-Hindu</option>
                <option value = 'religion_rc'>Religion-RC</option>
                <option value = 'tamil'>Tamil</option>
                <option value = 'mathematics'>Mathematics</option>
                <option value = 'social'>Social</option>
                <option value = 'english'>English</option>
            </select><br><br>
            Marks:<br><br>
            <input type="text" name="marks"><br><br>
            Year:<br><br>
            <input type="text" name="year"><br><br>
            Term:<br><br>
            <select name='term'>
                <option value = 1>I</option>
                <option value = 2>II</option>
                <option value = 3>III</option>
            </select><br><br>
            <input type="submit" value="Submit">

        </form>

        <?php
        include '../Connect/Connect.php';

        if (isset($_POST['id']) && isset($_POST['subject']) && isset($_POST['marks']) && isset($_POST['year'])&& isset($_POST['term'])){
            if(!empty($_POST['id']) && !empty($_POST['subject']) && !empty($_POST['marks']) && !empty($_POST['year'])&& !empty($_POST['term'])){

                $id = $_POST['id'];
                $subject = $_POST['subject'];
                $marks = $_POST['marks'];
                $year = $_POST['year'];
                $term = $_POST['term'];

                $query = "UPDATE termmarks SET Marks = '$marks' WHERE ID = '$id' AND Subject = '$subject' AND Year = '$year' AND Term ='$term'";
                if($query_run = mysqli_query($link, $query)){
                    $message='Update Successful';
                } else {
                    $message= 'Update Failed!!!';
                }

            } else {
                $message = 'None of the fields can take an empty value';
            }

        } else {
            $message =  'All the required fields should be filled';
        }

        ?>

    </div>

    <div id="sidebar">
        <?php
        echo $message;
        ?>

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