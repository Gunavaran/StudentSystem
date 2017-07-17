
<?php
require '../Connect/Connect.php';
if (isset($_POST['indexno']) && !empty($_POST['indexno'])){
    $indexno = $_POST['indexno'];

    if ($link || mysqli_select_db($link,$database)){
        //echo "Connection successful;";
    } else {
        echo "connection failed";
    }

    $query = "SELECT * FROM pilot_marks WHERE StudentID ='$indexno' ";
    $query_run = mysqli_query($link,$query);

    $query_details = "SELECT * FROM student_details where StudentID = '$indexno'";
    $query_run_detail = mysqli_query($link, $query_details);
    $query_row_detail = mysqli_fetch_assoc($query_run_detail);
    $id = $query_row_detail['StudentID'];
    $id2 = $indexno * 1;
    $firstname = $query_row_detail['FirstName'];
    $lastname = $query_row_detail['LastName'];
    $grade = $query_row_detail['Grade'];
    $division = $query_row_detail['Division'];

    $user = $_SESSION['username'];
    $query_user = "SELECT grade , division FROM staffuser WHERE username = '$user'";
    $query_user_run = mysqli_query($link, $query_user);
    $query_user_row = mysqli_fetch_assoc($query_user_run);
    $staff_grade = $query_user_row['grade'];
    $staff_division = $query_user_row['division'];

    if (strlen($indexno) != 6){
        echo "Length of StudentID should be 6. Submit Failed!!!";
    } else if(!is_numeric($indexno)){
        echo "StudentID can only be numbers. Submit Failed!!!";
    } else if (!is_int($id2)) {
        echo 'StudentID can only be an integer values. Submit Failed!!!';
    }else if (mysqli_num_rows($query_run) == NULL){
        echo "Marks is not found!!!";
    } else if(($staff_grade != 'all' && $grade != $staff_grade) || ($staff_division != 'all' && $division != $staff_division)){
        echo "StudentID does not belong to your class. Submit Failed!!!";
    } else {

            echo 'StudentID: '.$id.'<br/>';
            echo 'First Name: '.$firstname.'<br/>';
            echo 'Last Name: '.$lastname.'<br/>';
            echo 'Grade: '.$grade.'<br/>';
            echo 'Division: '.$division.'<br/>';

        while($query_row = mysqli_fetch_assoc($query_run)){
                $serial = $query_row['SerialNo'];
                $part1 = $query_row['Part1'];
                $part2 = $query_row['Part2'];
                echo 'Serial '.$serial.':<br/>';
                echo 'Part1: '.$part1. '   ';
                echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPart2: '.$part2. '   ';
                echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal: ';
                echo ((int)$part1 + (int)$part2)/2;
                echo '<br/>';

        }

    }
} else {
    echo 'All the required fields should be filled. Submit Failed!!!';
}


