<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['check'])) {
// Counting number of checked checkboxes.
        $checked_count = count($_POST['check']);
        echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
        foreach($_POST['check_list'] as $selected) {
            $selected=true;
        }
    }
    else{
        echo "<b>Please Select Atleast One Option.</b>";
    }
}
?>