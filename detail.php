<?php
require 'Connect/Connect.php';
if ($link || mysqli_select_db($link,$database)){
    //echo "Connection successful;";
} else {
    echo "connection failed";
}
if (isset($_GET['id'])) {
    if(!empty($_GET['id'])) {
        if($_GET['id'] === (string)(int) $_GET['id'] AND strlen($_GET['id'])==1) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM detail WHERE ID=$id";
            $result = mysqli_query($link, $sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "Student ID: " . $row["ID"] . '<br>' . '<br>';
                    echo "First Name: " . $row["First_name"] . '<br>' . '<br>';
                    echo "Grade: " . $row["Grade"] . '<br>' . '<br>';
                    echo "Division: " . $row["Division"] . '<br>' . '<br>';
                    echo "Address: " . $row["Address"] . '<br>' . '<br>';
                    echo "DOB: " . $row["DOB"] . '<br>' . '<br>';
                    echo "email: " . $row["email"] . '<br>' . '<br>';
                    echo "Telephone No: " . $row['Telephone'] . '<br>' . '<br>';
                } else {
                    echo "Please check your Student ID...No details were found!!!";
                }
            }
        }else {echo 'Invalid format of Student ID';}
    }else {echo 'None of the fields can take an empty value';}
}else {echo 'All the required fields should be filled';}
?>