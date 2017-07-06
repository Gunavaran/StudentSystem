

<?php
include '../Connect/Connect.php';

if (isset($_POST['id']) && isset($_POST['subject']) && isset($_POST['marks']) && isset($_POST['year'])&& isset($_POST['term'])){
    if(!empty($_POST['id']) && !empty($_POST['subject']) && !empty($_POST['marks']) && !empty($_POST['year'])&& !empty($_POST['term'])){

        $id = $_POST['id'];
        $subject = $_POST['subject'];
        $marks = $_POST['marks'];
        $year = $_POST['year'];
        $term = $_POST['term'];

        $query = "UPDATE termmarks SET Marks = '$marks' WHERE ID = '$id' AND Subject = '$subject'";
        if($query_run = mysqli_query($link, $query)){
            $message='Update Successful';
        } else {
            $message= 'Update Failed!!!';
        }

    } else {
        $message = 'None of the fields can take an empty value';
    }

} else {
    $message =  'All the required fields should be filled';
}

?>