
<?php
include '../Connect/Connect.php';

    $today=date_create(getdate());

    $date1=date_create("2017-01-22");
    $date2=date_create("2013-12-12");
    $diff=date_diff($date1,$date2);
        echo $diff->format("%R%a ");
        print_r( $today);

?>