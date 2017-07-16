<?php
/*
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
*/
$username=$_SESSION['username'];
$query = "SELECT Role FROM users WHERE username = '$username'";
$query_run = mysqli_query($link, $query);
$query_row = mysqli_fetch_assoc($query_run);
$role = $query_row['Role'];
if ($role== 'student') {
    $attendance_query = "SELECT Attendance, Date FROM attendance WHERE StudentID = '$username'";
    $attendance_query_run = mysqli_query($link, $attendance_query);
    $count = 0;
    $days = 0;
    while ($attendance_row = mysqli_fetch_assoc($attendance_query_run)) {
        $attendance = $attendance_row['Attendance'];
        $date = $attendance_row['Date'];
        $days++;
        if (strtoupper($attendance) == 'A') {
            $count++;
        }
    }
    if ($count>0) {
        $absence = floor(($count * 10000) / ($days * 100));
        $attendance = 100 - $absence;
        if ($absence > 20) {
            echo '</br>You have a poor attendance rate of ' . $attendance . '%.</br>';
        }
    }
}