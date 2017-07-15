<?php
require '../Connect/Connect.php';

    $message = '';
    $division = $_POST['division'];
    $user = $_SESSION['username'];
    $query_user = "SELECT division FROM staffuser WHERE username = '$user'";
    $query_user_run = mysqli_query($link, $query_user);
    $query_user_row = mysqli_fetch_assoc($query_user_run);
    $staff_division = $query_user_row['division'];

    if (($staff_division != 'all' && $division != $staff_division)){
        echo "You do not have access to this division";
    } else {
        $query_details = "SELECT * FROM student_details where Grade = 5 AND Division = '$division'";

        if (($query_run_detail = mysqli_query($link, $query_details)) && mysqli_num_rows($query_run_detail) != NULL) {
            ?>
            <div id = 'heading'>
                <?php
                echo "Pilot Exam Report For Division ".$division;
                echo '<br>';
                ?>
            </div>

            <?php

            while ($query_row_detail = mysqli_fetch_assoc($query_run_detail)) {

                $id = $query_row_detail['StudentID'];
                $firstname = $query_row_detail['FirstName'];
                $lastname = $query_row_detail['LastName'];
                $grade = $query_row_detail['Grade'];
                $division = $query_row_detail['Division'];

                echo 'StudentID: ' . $id . '<br/>';
                echo 'First Name: ' . $firstname . '<br/>';
                echo 'Last Name: ' . $lastname . '<br/>';

                $query = "SELECT * FROM pilot_marks WHERE StudentID = '$id'";


                if ( $query_run = mysqli_query($link, $query)) {

                    while ($query_row = mysqli_fetch_assoc($query_run)) {

                        $serial = $query_row['SerialNo'];
                        $part1 = $query_row['Part1'];
                        $part2 = $query_row['Part2'];
                        echo 'Serial ' . $serial . ':<br/>';
                        echo 'Part1: ' . $part1 . '   ';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPart2: ' . $part2 . '   ';
                        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal: ';
                        echo ((int)$part1 + (int)$part2) / 2;
                        echo '<br/>';
                    }
                    echo '<br/>';


                } else {
                    echo "No data is found";
                }
            }

            } else {
                echo "No data is found";
        }
    }











