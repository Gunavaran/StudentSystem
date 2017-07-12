<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>

    <html>
<head>

    <title> Update Student Details</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include '../Styles/FormStyle.html';
    ?>
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

            <fieldset>
                <input type="radio" name="option" value="FirstName" onclick="document.location.href='FisrtName.php'"/> First Name <br/>
                <input type="radio" name="option" value="LastName" onclick="document.location.href='LastName.php'" /> Last Name<br/>
                <input type="radio" name="option" value="Address" onclick="document.location.href='Address.php'"/> Address<br/>
                <input type="radio" name="option" value="PhoneNumber" onclick="document.location.href='PhoneNumber.php'"/> Phone Number <br/>
                <input type="radio" name="option" value="Email" onclick="document.location.href='Email.php'"/> E-Mail <br/>
                <input type="radio" name="option" value="FatherName" onclick="document.location.href='FatherName.php'"/> Father's Name <br/>
                <input type="radio" name="option" value="FatherJob" onclick="document.location.href='FatherJob.php'"/> Father's Job <br/>
                <input type="radio" name="option" value="MotherName" onclick="document.location.href='MotherName.php'"/> Mother's Name <br/>
                <input type="radio" name="option" value="MotherJob" onclick="document.location.href='MotherJob.php'"/> Mother's Job <br/>
                <input type="radio" name="option" value="Grade" onclick="document.location.href='Grade.php'"/> Grade <br/>
                <input type="radio" name="option" value="Division" onclick="document.location.href='Division.php'"/> Division <br/>
                <input type="radio" name="option" value="DateOfBirth" onclick="document.location.href='DateOfBirth.php'"/> Date Of Birth <br/>
            </fieldset>


        </form>
    </div>

    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>

</div>
</body>
</html>
<?php
} else {
    include '../Log_in_out/loginform.php';
}
