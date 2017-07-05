
<?php

if (isset($_POST['username']) && isset($_POST['password'])){
    $username1 = $_POST['username'];
    $password = $_POST['password'];
    $password_md5 = md5($_POST['password']);

    if (!empty($username) && !empty($password)){
        $query = "SELECT id, username FROM users WHERE username = '$username1' AND password = '$password_md5'";
        if($query_run = mysqli_query($link,$query)){
            if (mysqli_num_rows($query_run)==0){
                echo 'username and password are unmatched';
            } else {
                $query_row=mysqli_fetch_assoc($query_run);
                $_SESSION['user_id'] = $query_row['id'];
                $_SESSION['username'] = $query_row['username'];
                header('Location: index.php');
            }
        }
    } else{
        echo 'You should enter username and password';
    }
}

?>

<html>
<head>

    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <div id="content_area">
        <img src="../Images/johnbosco.png" class="imageFront">

    </div>
    <form action="<?php echo $current_file?>" method="post" class="form">
        Username: <br><br>
        <input type="text" name="username"><br><br>
        Password:<br><br>
        <input type="text" name="password"><br><br>
        <br><br>
        <input type="submit" value="Login">
    </form>

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