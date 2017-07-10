<html>
<head>

    <title> Update Student Details</title>
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
        <h2>Select Details and Update</h2>
        <form action="updateDetails.php" method="post" name="fixedform">
            ID: <br><br>
            <input type="text" name="ID"><br><br>
            <fieldset>
                <legend>Please what you need to change</legend>
                <input type="radio" name="fname" id="fname" value="" />         First Name       <input type="text" name="fname1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="lname" id="lname" value=""  />        Last Name        <input type="text" name="lname1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="add" id="add" value=""  />            Address          <input type="text" name="add1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="phone" id="phone" value=""  />        Phone Number     <input type="text" name="phone1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="mail" id="mail" value=""  />          E-mail           <input type="text" name="mail1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="dob" id="dob" value=""  />            Date Of Birth    <input type="text" name="dob1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="fathername" id="fathername" value=""/>Father's Name    <input type="text" name="fathername1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="mothername" id="mothername" value=""/>Mother's Name    <input type="text" name="mothername1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="fatherJob" id="fatherJob" value=""  />Father's Job     <input type="text" name="fatherJob1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
                <input type="radio" name="motherJob" id="motherJob" value=""  />Mother's Job     <input type="text" name="motherJob1" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
            </fieldset>

            <input type="submit" value="Submit">
            <input type="reset">

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

                $query = "UPDATE detail SET Marks = '$marks' WHERE ID = '$id' AND Subject = '$subject' AND Year = '$year' AND Term ='$term'";
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