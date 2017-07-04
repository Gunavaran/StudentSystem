<?php

$title = 'Home';
$content = 'hei';

include 'Connect/Connect.php';
require 'Log_in_out/core.php';


if (logged_in()){
    require 'Templates/BasicTemplate.php';


} else {
    include 'Log_in_out/loginform.php';
}