<?php

session_start();

echo "<!DOCTYPE html> 
  <html> 
     <head> 
        <meta charset='utf-8'> 
        <title>Sprout</title>
    <link rel='stylesheet' href='stylesheet.css' type='text/css'>
     </head>
 <body>
    <div class='box'>
    <form action='login.php' method='post'>
       Name<br /> <input type='text' name='username' class='form'/><br />
       Password<br /> <input type='password' name='password' class='form'/>
       <input type='submit' value='Login' class='button' />
    </form>
    </div>
 </body>
  </html>";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";

    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to database");

    $dbname = "database";

    mysql_select_db($dbname);

    $query = "SELECT username FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysql_query($query) or die ("Failed Query of " . $query);


    while($row = mysql_fetch_assoc($result))
    {
        $_SESSION["user"] = $username;
    }
}
?>
