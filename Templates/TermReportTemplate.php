<?php
/**
 * Created by PhpStorm.
 * User: Vahe
*/

$content= "<form action=\"TermReportTemplate.php\" method=\"get\">
            IndexNo:<br><br>
            <input type='text' name='indexno' >
            <br><br>
            <input type='submit' value='Submit'>
    </fieldset>
</form>";
include '../TermExam/termReport.php';

include 'BasicTemplate.php';
?>