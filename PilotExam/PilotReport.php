<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 7/1/2017
 * Time: 3:01 PM
 */

require 'Connect.php';

?>

<form action="PilotReport.php" method="get">
    <fieldset>
        <legend>Choose Index Number</legend>
        IndexNo:<br>
        <input type="text" name="indexno" >
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>

    </select>
</form>

<?php

if (isset($_GET['indexno']) and !empty($_GET['indexno'])){
    $indexno = $_GET['indexno'];

    if ($link || mysqli_select_db($link,$database)){
        //echo "Connection successful;";
    } else {
        echo "connection failed";
    }

    $query = "SELECT * FROM pilot_marks WHERE StudentID ='$indexno' ";
    $query_details = "SELECT * FROM student_details where StudentID = '$indexno'";
    $query_run = mysqli_query($link,$query);
    $query_run_detail = mysqli_query($link, $query_details);

    if (mysqli_num_rows($query_run) == NULL){
        echo "No data has been found";
    } else {
        while ($query_row_detail = mysqli_fetch_assoc($query_run_detail)){
            $id = $query_row_detail['StudentID'];
            $firstname = $query_row_detail['FirstName'];
            $lastname = $query_row_detail['LastName'];
            $grade = $query_row_detail['Grade'];
            $division = $query_row_detail['Division'];

            echo 'StudentID: '.$id.'<br/>';
            echo 'First Name: '.$firstname.'<br/>';
            echo 'Last Name: '.$lastname.'<br/>';
            echo 'Grade: '.$grade.'<br/>';
            echo 'Division: '.$division.'<br/>';
        }

        while($query_row = mysqli_fetch_assoc($query_run)){
                $serial1 = $query_row['Serial1'];
                $serial2 = $query_row['Serial2'];
                $serial3 = $query_row['Serial3'];
                echo 'Serial1: '.$serial1.'<br/>';
                echo 'Serial2: '.$serial2.'<br/>';
                echo 'Serial3: '.$serial3;
        }

    }
}


