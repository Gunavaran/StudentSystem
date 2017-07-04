<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 7/3/2017
 * Time: 9:21 PM
 */

ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function logged_in(){
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
}