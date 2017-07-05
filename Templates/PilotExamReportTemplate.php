<?php
$content = " <form action=\"PilotExamReportTemplate.php\" method=\"get\">
            <fieldset>
                <legend>Choose Index Number</legend>
                IndexNo:<br>
                <input type=\"text\" name=\"indexno\" >
                <br><br>
                <input type=\"submit\" value=\"Submit\">
            </fieldset>
        </form>";
include '../PilotExam/PilotReport.php';
include 'BasicTemplate.php';