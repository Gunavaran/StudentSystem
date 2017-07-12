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
            height: 325px;
            margin: 20px 10px;
            padding: 10px;
            border: 2px solid #E3E3E3;
            border-radius: 5px;
            font-family: "Adobe Gothic Std B";
        }

        #content_area{

            float: left;
            width: 25%;
            margin: 20px 0px 20px 0px;
            padding: 10px;
        }

        #resultbar{
            float: left;
            width: 500px;
            height: 400px;
            margin: 10px 10px 0px 0px;
            padding-left: 8px;
            padding-right: 8px;
            padding-top: 0px;
            font-family: "AR BERKLEY";
            font-size: x-large;
            color: darkblue;
        }

        div[id = message]{
            color: crimson;
            margin-top: 10px;
            padding: 14px 20px;
            width: auto ;
            border-radius: 2px;
        }


    </style>
</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <div id="content_area">
        <img src="../Images/johnbosco.png" class="imageFront">

    </div>

    <div id = "resultbar">
        <h1 style="margin-top: 150px"> <i>"Love and Service"</i> </h1>

    </div>
    <form action="<?php echo $current_file?>" method="post" class="form">
        Username: <br>
        <input type="text" name="username"><br><br>
        Password:<br>
        <input type="text" name="password"><br><br>
        <input type="submit" value="Login">
        <?php
        $message = '';
        if (isset($_POST['username']) && isset($_POST['password'])){
            $username1 = $_POST['username'];
            $password = $_POST['password'];
            $password_md5 = md5($_POST['password']);

            if (!empty($username1) && !empty($password)){
                $query = "SELECT id, username FROM users WHERE username = '$username1' AND password = '$password_md5'";
                if($query_run = mysqli_query($link,$query)){
                    if (mysqli_num_rows($query_run)==0){
                        $message = 'username and password are unmatched';
                    } else {
                        $query_row=mysqli_fetch_assoc($query_run);
                        $_SESSION['user_id'] = $query_row['id'];
                        $_SESSION['username'] = $query_row['username'];
                        header('Location: index.php');
                    }
                }
            } else{
                $message= 'You should enter username and password';
            }
        }

        ?>
        <div id="message">
            <?php
            echo $message
            ?>
        </div>

    </form>

    <?php
    include "../Styles/FooterStyle.html";
    ?>

</div>
</body>
</html>
