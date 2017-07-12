<?php

$title = 'Home';
$content = '';

include '../Connect/Connect.php';
require '../Log_in_out/core.php';


if (logged_in()){
    require '../Templates/BasicTemplate.php';
    $user =  $_SESSION['username'];
    include '../Notifications/notifyLowMarks.php';
    include '../Notifications/notifyPoorAttendance.php';

} else {
    include '../Log_in_out/loginform.php';
}

