<?php
include "../Log_in_out/core.php";
if (logged_in()) {
    ?>


<?php
} else {
    include '../Log_in_out/loginform.php';
}
