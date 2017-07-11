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

    <title> Log In</title>
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

        .form{
            background-color: lightgray;
            float: right;
            width: 250px;
            height: 300px;
            margin: 20px 10px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
        }


    </style>
</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <div id="content_area">
        <img src="../Images/johnbosco.png" class="imageFront">

    </div>
    <form action="<?php echo $current_file?>" method="post" class="form">
        Username: <br>
        <input type="text" name="username"><br><br>
        Password:<br>
        <input type="text" name="password"><br><br>
        <input type="submit" value="Login">

    </form>

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
