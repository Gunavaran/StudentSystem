<?php

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_md5 = md5($_POST['password']);

    if (!empty($username) && !empty($password)){
        $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password_md5'";
        if($query_run = mysqli_query($link,$query)){
            if (mysqli_num_rows($query_run)==0){
                echo 'username and password are unmatched';
            } else {
                $query_row=mysqli_fetch_assoc($query_run);
                $_SESSION['user_id'] = $query_row['id'];
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
    <link rel="stylesheet" type = "text/css" href = "Styles/stylesheets.css"/>

</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <div id="content_area">

        <form action="<?php echo $current_file?>" method="post">
            Username:
            <input type="text" name="username">
            Password:
            <input type="text" name="password">

            <input type="submit" value="Login">
        </form>
    </div>

    <footer>
        <p> All rights reserved</p></footer>

</div>
</body>
</html>