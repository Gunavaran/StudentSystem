
<?php
$message = '';
require '../Connect/Connect.php';
if (isset($_POST['division']) and isset($_POST['year']) and isset($_POST['serialno'])){
    if (!empty($_POST['division']) and !empty($_POST['year']) and !empty($_POST['serialno'])){
        $division = $_POST['division'];
        $serialno = $_POST['serialno'];
        $year = $_POST['year'];

        if ($link || mysqli_select_db($link,$database)){
            //echo "Connection successful;";
        } else {
            echo "connection failed";
        }

        $query = "SELECT * FROM pilot_marks WHERE Year = '$year' AND SerialNo = '$serialno'";
        if ($division != 'all'){
            $division_query = "SELECT StudentID FROM student_details WHERE Grade = 5  AND Division = $division ";
        } else{
            $division_query = "SELECT StudentID FROM student_details WHERE Grade = 5";
        }

        if($query_run = mysqli_query($link,$query)){
                $count1 = 0;
                $count2 = 0;
                $count3 = 0;
                $count4 = 0;
                $count5 = 0;
                $count6 = 0;
                $count7 = 0;
                $count8 = 0;
                $count9 = 0;
                $count10 = 0;
                while ($query_row = mysqli_fetch_assoc($query_run)) {
                    $part1 = (int)$query_row['Part1'];
                    $part2 = (int)$query_row['Part2'];

                    $marks = ((int)$part1 + (int)$part2)/2;
                    if ($marks < 11) {
                        $count1++;
                    } else if ($marks < 21) {
                        $count2++;
                    } else if ($marks < 31) {
                        $count3++;
                    } else if ($marks < 41) {
                        $count4++;
                    } else if ($marks < 51) {
                        $count5++;
                    } else if ($marks < 61) {
                        $count6++;
                    } else if ($marks < 71) {
                        $count7++;
                    } else if ($marks < 81) {
                        $count8++;
                    } else if ($marks < 91) {
                        $count9++;
                    } else if ($marks < 100) {
                        $count10++;
                    }


                }

                echo "00 -10: ".$count1.'<br/>';
                echo "11 -20: ".$count2.'<br/>';
                echo "21 -30: ".$count3.'<br/>';
                echo "31 -40: ".$count4.'<br/>';
                echo "41 -50: ".$count5.'<br/>';
                echo "51 -60: ".$count6.'<br/>';
                echo "61 -70: ".$count7.'<br/>';
                echo "71 -80: ".$count8.'<br/>';
                echo "81 -90: ".$count9.'<br/>';
                echo "91 -100: ".$count10.'<br/>';

        } else {
            echo "Data does not exist";
        }

    } else {
        $message = "Required fields cannot take empty values";
    }
} else {
    $message = "All the required fields should be entered";
}


