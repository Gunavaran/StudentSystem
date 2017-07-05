<?php
$content = " <form action=\"PilotExamAnalysisTemplate.php\" method=\"post\">
 
            <fieldset> 
            Year: <br>
            <input type='text' name='year'><br>
            SerialNo: <br>
            <input type='text' name='serialno'><br>
            Division: <br>
            <select name = 'division'>
            <option value = 'all'>All</option>
            <option value = 'A'>A</option>
            <option value = 'B'>B</option>
            <option value = 'C'>C</option>
            <option value = 'D'>D</option>
            <option value = 'E'>E</option>
            <option value = 'F'>F</option>
            </select><br><br>
            <input type='submit' value='Submit'>
            </fieldset>
            
            </form>";
include '../PilotExam/PilotAnalysis.php';

include 'BasicTemplate.php';