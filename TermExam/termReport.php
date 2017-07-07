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

if (isset($_GET['indexno'])&&isset($_GET['year'])&& isset($_GET['term'])){
    $year=$_GET['year'];
    $term=$_GET['term'];
    $indexno = $_GET['indexno'];
    if(empty($indexno)) {
        $content= 'Please enter the Index Number';
    }else{
        if(empty($year)&&empty($term)){
            $content= 'Please enter year and term';
        }elseif (empty($year)){
            $content= 'Please enter year';
        }elseif (empty($term)){
            $content= 'Please enter term';
        }else{
            $query = "SELECT * FROM termMarks WHERE StudentID ='$indexno' AND Year='$year' AND Term='$term'";
            $query_details = "SELECT * FROM student_details where StudentID = '$indexno'";
            $query_run = mysqli_query($link,$query);
            $query_run_detail = mysqli_query($link, $query_details);

            if (mysqli_num_rows($query_run) == NULL){
                $content= 'Marks of '.$indexno.' for the Term '.$term.' of '.$year.'are not available.';
            } else {
                while ($query_row_detail = mysqli_fetch_assoc($query_run_detail)){
                    $id = $query_row_detail['StudentID'];
                    $firstname = $query_row_detail['FirstName'];
                    $lastname = $query_row_detail['LastName'];
                    $grade = $query_row_detail['Grade'];
                    $division = $query_row_detail['Division'];

                    $content='StudentID: '.$id.'<br/>'.'First Name: '.$firstname.'<br/>'.'Last Name: '.$lastname.'<br/>'.'Grade: '.$grade.'<br/>'.'Division: '.$division.'<br/>';
                }
                while($query_row = mysqli_fetch_assoc($query_run)){
                    $subject = $query_row['Subject'];
                    $marks = $query_row['Marks'];
                    $content.= $subject.': '.$marks.'<br/>';
                }
            }
        }
    }
}else{
    $content= 'Please fill all the fields';
}


include '../Templates/BasicTemplate.php';
    
?>
