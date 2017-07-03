<?php
/**
 * Created by PhpStorm.
 * User: Vahe
 * Date: 6/30/2017
 * Time: 5:31 PM
 */

if (isset($_GET['year'])&& isset($_GET['term'])){
    $year=$_GET['year'];
    $term=$_GET['term'];
    if(empty($year)&&empty($term)){
        echo 'Please enter year and term';
    }elseif (empty($year)){
        echo 'Please enter year';
    }elseif (empty($term)){
        echo 'Please enter term';
    }else{
        echo 'You are directed to competition details of term '.$term.' of '.$year;
    }
}
?>


<form action="compDetail.php" method="GET">
    <!--Year: <br><input type="number" name="year"><br>
    Term: <br><input type="number" name="term"><br>-->
    <br>
    Year:
    <select name="year">
        <!--<option value="NULL">----</option>-->
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
    </select>
    <br>
    <br>
    Term:
    <select name="term">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <br>
    <br><input type="submit" value="Submit">
</form>

