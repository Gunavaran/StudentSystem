<?php

$notifyquery="SELECT * FROM notify_attendance WHERE StudentID=$username";
if ($notifyquery_run=mysqli_query($link,$notifyquery)){
    if (mysqli_num_rows($notifyquery_run) != NULL) {
        while ($notifyquery_row = mysqli_fetch_assoc($notifyquery_run)) {
            $attendance =100- $notifyquery_row['Absence'];
            echo 'You have a poor attendance of ' . $attendance . '% for this year.'.'<br/><br/>';
            $delequery="DELETE FROM notify_attendance WHERE StudentID=$username";
            $delequery_run=mysqli_query($link,$delequery);
        }
    }

}
