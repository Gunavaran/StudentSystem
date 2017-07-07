<?php
/**
 * Created by PhpStorm.
 * User: Vahe
*/

$content= "<form action=\"../TermExam/termReport.php\" method=\"get\">
                IndexNo:<br>
                    <input type='text' name='indexno' >
                    <br>
                Year:<br>
                    <input type='text' name='year' >
                    <br>
                Term:
                    <select name=\"term\">
                        <option value=\"1\">1</option>
                        <option value=\"2\">2</option>
                        <option value=\"3\">3</option>
                        </select><br><br>
                <input type=\"submit\" value=\"Submit\">
           </form>";

include 'BasicTemplate.php';
?>