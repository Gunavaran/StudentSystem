<?php
$notiquery="SELECT * FROM notify_marks WHERE StudentID=$username1";
$notiquery_run=mysqli_query($link,$notiquery);
if (mysqli_num_rows($notiquery_run) != NULL) {
    while ($notiquery_row = mysqli_fetch_assoc($notiquery_run)) {
        $subject = $notiquery_row['Subject'];
        $content.= 'You have got poor marks for ' . $subject . ' in the last term examination.' . '<br/>';
        $delquery="DELETE FROM notify_marks WHERE StudentID=$username1 AND Subject='$subject'";
        $delquery_run=mysqli_query($link,$delquery);
    }
}
?>
//include this under the validated part of the index.php