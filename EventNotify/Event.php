
<div>
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

    $today= date('Y-m-d');




    $query = "SELECT * FROM calendar WHERE Date='$date1'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) != NULL) {
        while ($row = mysqli_fetch_assoc($result)) {
            $today_event = $row['Event'];
            echo 'There will be a ' . $today_event .' on '.$date1 . '<br/>';
        }
    }

    $query = "SELECT * FROM calendar WHERE Date='$date2'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) != NULL) {
        while ($row = mysqli_fetch_assoc($result)) {
            $today_event = $row['Event'];
            echo 'There will be a ' . $today_event .' on '.$date2 . '<br/>';
        }
    }

    $query = "SELECT * FROM calendar WHERE date='$today'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) != NULL) {
        while ($row = mysqli_fetch_assoc($result)) {
            $today_event = $row['Event'];
            echo 'There will be a ' . $today_event .' Today!!'. '<br/>';
        }
    }


    ?>
</div>

