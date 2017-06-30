




    <?php

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_db = "table";

    $link = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db) or die("could not connect");

    if($link){
        echo "Connected!<br>";

    }
    else{
        echo "Could not connect!";
    }

    $sid = $_POST[ 'Student_ID'];
    $fname= $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $tam= $_POST['Tamil'];
    $mat= $_POST['Maths'];
    $eng= $_POST['English'];

    $inp = "INSERT INTO frst_term(Student_ID, FirstName, LastName, Tamil, Maths, English ) VALUES ('$sid', '$fname', '$lname', '$tam', '$mat', '$eng')";

    if (!mysqli_query($link, $inp)) {
        die('Error: ' . mysql_error());
    }
    else{
        echo "data entaered";
    }
   // $mysql_close($link);




    ?>

