<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>

    <title> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <?php
    include "../Styles/FormStyle.html";
    ?>
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
       <form action="changePassword.php" method="post" name="fixedform">
           Old Password: <br>
           <input type="text" name="oldpw"><br><br>
           New Password:<br>
           <input type="text" name="newpw"><br><br>
           Reenter Password:<br>
           <input type="text" name="reenteredpw"><br><br>
           <input type="submit" value="Submit">

           <?php
           $message = '';
           if (isset($_POST['oldpw']) && isset($_POST['newpw']) && isset($_POST['reenteredpw'])){
               if (!empty($_POST['oldpw']) && !empty($_POST['newpw']) && !empty($_POST['reenteredpw'])){
                   include '../Connect/Connect.php';
                   $username = $_SESSION['username'];
                   $query = "SELECT password FROM users WHERE username = '$username'";
                   $query_run = mysqli_query($link, $query);
                   $query_row = mysqli_fetch_assoc($query_run);
                   $password = $query_row['password'];
                   $entered_password = md5($_POST['oldpw']);
                   $new_password = md5($_POST['newpw']);
                   $reentered_password = md5($_POST['reenteredpw']);
                   $pw_query = "UPDATE users SET password = '$new_password' WHERE username = '$username'";

                   if ($password == $entered_password){
                       if ($new_password == $reentered_password){
                            if (mysqli_query($link, $pw_query)){
                                $message = "Password changed successfully";
                            } else {
                                $message = "Submit failed!!!";
                            }
                       } else {
                           $message = "Passwords do not match";
                       }
                   } else {
                       $message = "Incorrect password";
                   }
               } else {
                   $message = "Fields cannot take empty values";
               }
           } else {
               $message = "All the fields should be filled ";
           }
           ?>

           <div id="message">
               <?php
               echo $message
               ?>
           </div>

       </form>

    </div>

    <?php
    include '../Styles/SidebarStyle.html';
    include '../Styles/FooterStyle.html';
    ?>
</div>
</body>
</html>