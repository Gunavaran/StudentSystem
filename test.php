<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 7/6/2017
 * Time: 11:44 AM
 */
$array = array();
array_push($array,'A');

print_r($array);

echo md5('pass123');
/**
 * value = "
<?php
include '../Connect/Connect.php';
$grade = $_POST['grade'];
$division = $_POST['division'];
if (isset($_POST['date']) && isset($_POST['grade']) && isset($_POST['division'])){
$query_id ="SELECT StudentID FROM student_details WHERE Grade = '$grade' AND Division = '$division'";
$queryid_run = mysqli_query($link,$query_id);
while($queryid_row = mysqli_fetch_assoc($queryid_run)){
$id = $queryid_row['StudentID'];
}
}

?>
"

 */