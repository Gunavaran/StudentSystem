<?php

$title = 'Home';
$content = '';

include '../Connect/Connect.php';
require '../Log_in_out/core.php';

if (logged_in()){
    require 'BasicTemplate.php';
    $user =  $_SESSION['username'];

} else {
    include '../Log_in_out/loginform.php';
}

