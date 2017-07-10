<html>
<head>

    <title> Update Student Details</title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        input[type = text]{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit]{

            padding: 14px 20px;
            width: 100%;
            background-color: #4CAF50;
            border-radius: 2px;
        }

        input[type = date]{
            width: 100%;
            height: 30px;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form[name = fixedform]{
            float: left;
            width: 40%;
            margin: 20px 10px 0px 300px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
            background-color: darkgrey;
        }

        div[id = message]{
            color: crimson;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }

        .heading{
            margin-left: 300px;
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
            <li><a href="../Templates/index.php"> Home </a> </li>
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/TermMarksTemplate.php">TermMarks</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <html>
        <body>
        <h2>Select Details and Update</h2>
        <form action="updateDetails.php" method="post" name="fixedform">

            <fieldset>
                <input type="radio" name="option" value="FirstName" onclick="document.location.href='FirstName.php'"/> First Name <br/>
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
        </body>
        </html>


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