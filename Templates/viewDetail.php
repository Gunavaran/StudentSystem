<?php
$content="<form action=\"viewDetail.php\" method=\"get\">
    <label>Enter Student ID</label>
    <input type=\"text\" name=\"id\" placeholder=\"Student ID\"><br>
    <button type=\"submit\">Submit</button>
</form>";

include '../detail.php';
include "BasicTemplate.php";