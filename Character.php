<?php
require '../Connect/Connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($link || mysqli_select_db($link,$database)){
        //echo "Connection successful;";
    } else {
        echo "connection failed";
    }
    $sql = "SELECT First_name,Last_name,Grade FROM `detail` WHERE ID=$id";
    $result = mysqli_query($link, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first= $row['First_name'];
            $last= $row['Last_name'];
            $grade= $row['Grade'];
            echo "First Name: ".$first.'<br/>';
            echo "Last Name: ".$last.'<br/>';
            echo "Grade: ".$grade.'<br/>';
        }
    }else{
        echo "No data has been found";
    }
    echo "Character Detail: ";
    $sql = "SELECT Character_detail FROM `character` WHERE ID=$id";
    $result = mysqli_query($link, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $character= $row['Character_detail'];
            echo $character.'<br/>';
        }
    }
}
?>