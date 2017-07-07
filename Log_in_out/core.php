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

function getUserDetail($data){
    require '../Connect/Connect.php';
    $username= $_SESSION['username'];
    $query_user_detail = "SELECT $data FROM student_details WHERE StudentID ='$username'";
    if ($query_user_run = mysqli_query($link,$query_user_detail)){
        $user_detail_row = mysqli_fetch_assoc($query_user_run);
        return $user_detail_row[$data];
    }


}