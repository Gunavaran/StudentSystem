<?php
$title='Term Marks Analysis';
$content = "<form action=\"TermExamAnalysisTemplate.php\" method=\"post\">
 
            <fieldset> 
                Year:
                <input type='text' name='year'><br>
                Term:
                <select name='term'>
                    <option value = 1>I</option>
                    <option value = 2>II</option>
                    <option value = 3>III</option>
                </select><br>
                Subject:
                <select name='subject'>
                    <option value = 'religion'>Religion</option>
                    <option value = 'tamil'>Tamil</option>
                    <option value = 'mathematics'>Mathematics</option>
                </select><br>
                Division:
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
            
            </form> ";

include 'BasicTemplate.php';