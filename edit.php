
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
    $sub= $_POST['Subject'];
    $mark = $_POST['marks'];
   /* if('Subject'== "Tamil"){
        $tam= $_POST['Subject'];
    }
    elseif ()

    $mat= $_POST['Subject'];
    $eng= $_POST['Subject'];
   */

    $upd = "UPDATE frst_term SET Tamil='$mark' WHERE Student_ID=$sid";
    if (mysqli_query($link, $upd)) {
        echo " updated";
    }
    else{
        echo "not updated";
    }
   // $mysqli_close($link);




    ?>

