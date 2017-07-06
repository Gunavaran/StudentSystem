<?php
/**
 * Created by PhpStorm.
 * User: Vahe
 * Date: 7/5/2017
 * Time: 4:43 AM
 */

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'studentsystem';

$link= mysqli_connect($host,$username,$password,$database) or die ("could not connect");

if (isset($_GET['indexno']) and !empty($_GET['indexno'])){
    $indexno = $_GET['indexno'];


    $query = "SELECT * FROM termMarks WHERE StudentID ='$indexno' ";
    $query_details = "SELECT * FROM student_details where StudentID = '$indexno'";
    $query_run = mysqli_query($link,$query);
    $query_run_detail = mysqli_query($link, $query_details);

    if (mysqli_num_rows($query_run) == NULL){
        echo "Not available";
    } else {
        while($query_row = mysqli_fetch_assoc($query_run)){
            $subject = $query_row['Subject'];
            $marks = $query_row['Marks'];
            echo $subject.': '.$marks.'<br/>';

        }

    }
}
?>