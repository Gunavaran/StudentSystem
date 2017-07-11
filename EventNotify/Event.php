
<?php
include '../Connect/Connect.php';
        $date=array();
        $event=array();

    $today= date_create(date('Y-m-d'));
    date_add($today,date_interval_create_from_date_string("1 days"));
    $date1= date_format($today,"Y-m-d");

    $today=date_create(date('Y-m-d'));
    date_add($today,date_interval_create_from_date_string("2 days"));
    $date2= date_format($today,"Y-m-d");

    $thisyear=$today->format('Y');
    echo $thisyear."<br>";
// $diff=date_diff($date1,$date2);
// echo $diff->format("%R%a ");
    echo $date1."<br>", $date2."<br>";

$today= date('Y-m-d');




        $query = "SELECT FROM event WHERE date=$date1";
        $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
             // output data of each row
             while($row = mysqli_fetch_assoc($result)) {
                echo $row["event"]."<br>";
    }
}



?>