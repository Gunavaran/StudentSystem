<?php
include '../Connect/Connect.php';
$username=$_SESSION['username'];
$notiquery="SELECT * FROM notify_marks WHERE StudentID='$username' AND Shown='No'";
if ($notiquery_run=mysqli_query($link,$notiquery)){
    if (mysqli_num_rows($notiquery_run) !=0 ) {
        while ($notiquery_row = mysqli_fetch_assoc($notiquery_run)) {
            $subject = $notiquery_row['Subject'];
            echo  '<br/>You have got poor marks for ' . $subject . ' in the last term examination.' . '<br/><br/>';
            $shownquery="UPDATE notify_marks SET Shown='Yes' WHERE StudentID=$username AND Subject='$subject'";
            $shownquery_run=mysqli_query($link,$shownquery);
        }
    }
}


