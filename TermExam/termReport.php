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
$title='Term Exam Report';
$link= mysqli_connect($host,$username,$password,$database) or die ("could not connect");

if (isset($_GET['year'])&& isset($_GET['term'])){
    $error=0;

    $term=$_GET['term'];
    session_start();
    $username1 = '150196'; //$_SESSION['username'];
    $query_users = "SELECT Role FROM users WHERE username = '$username1'";
    $query_users_run = mysqli_query($link,$query_users);
    $query_users_row = mysqli_fetch_assoc($query_users_run);
    $role = $query_users_row['Role'];
    if($role=='student'){
        $indexno=$username1;
    }else{
        if(empty($_GET['indexno'])||(!isset($_GET['indexno']))) {
            $content = 'Please enter the Index Number';
            $error++;
        }else {
            if ($_GET['indexno'] !== (string)(int)$_GET['indexno'] OR strlen($_GET['indexno']) != 6) {
                $error++;
                echo 'Invalid format of Student ID' . '<br>';
            } else {
                $indexno = (int)$_GET['indexno'];
            }
        }
    }

    if(empty($_GET['year'])){
        $content= 'Please enter year';
        $error++;
    }else {
        if ($_GET['year'] !== (string)(int)$_GET['year'] OR strlen($_GET['year']) != 4) {
            $error++;
            echo 'Invalid input for year';
        } else {
            $year = (int)$_GET['year'];
        }
    }
    if($error==0) {
        $query = "SELECT * FROM termMarks WHERE StudentID ='$indexno' AND Year='$year' AND Term='$term'";
        $query_details = "SELECT * FROM student_details where StudentID = '$indexno'";
        $query_run = mysqli_query($link, $query);
        $query_run_detail = mysqli_query($link, $query_details);

        if (mysqli_num_rows($query_run) == NULL) {
            $content = 'Marks of ' . $indexno . ' for the Term ' . $term . ' of ' . $year . 'are not available.';
        } else {

                $query_row_detail = mysqli_fetch_assoc($query_run_detail);
                $id = $query_row_detail['StudentID'];
                $firstname = $query_row_detail['FirstName'];
                $lastname = $query_row_detail['LastName'];
                $grade = $query_row_detail['Grade'];
                $division = $query_row_detail['Division'];

            $query_user = "SELECT grade , division FROM staffuser WHERE username = '$username1'";
            $query_user_run = mysqli_query($link, $query_user);
            $query_user_row = mysqli_fetch_assoc($query_user_run);
            $staff_grade = $query_user_row['grade'];
            $staff_division = $query_user_row['division'];

            if(($role=='student') || (($staff_grade == 'all' || $grade == $staff_grade) && ($staff_division == 'all' || $division == $staff_division))) {
                $content = 'StudentID: ' . $id . '<br/>' . 'First Name: ' . $firstname . '<br/>' . 'Last Name: ' . $lastname . '<br/>' . 'Grade: ' . $grade . '<br/>' . 'Division: ' . $division . '<br/>';
                $total = 0;
                $subcount = 0;
                while ($query_row = mysqli_fetch_assoc($query_run)) {
                    $subject = $query_row['Subject'];
                    $marks = $query_row['Marks'];
                    $total += $marks;
                    $subcount += 1;
                    $content .= $subject . ': ' . $marks . '<br/>';
                }
                $avg = $total / $subcount;
                $content .= '<br/>Total = ' . $total . '<br/>Average = ' . $avg . '<br/>';
            }else{
                $content= "You are restricted to access the requested data";

            }
        }
    }
}else{
    $content= 'Please fill all the fields';
}


include '../Templates/BasicTemplate.php';
    
?>
