<?php
include 'Temp.php';
?>



<div id="content_area">
    <form action="LastName.php" method="post" name="fixedform">
        Last Name: <br><br>
        <input type="text" name="last"><br><br>

        <input type="submit" value="Submit">



        <?php

            include '../Connect/Connect.php';

            if(isset($_POST['last'])){
                if(!empty($_POST['last'])){
                    $last= $_POST['last'];

                    $query = "INSERT INTO student_details (LastName) VALUES ('$last')";
                    if($query_run = mysqli_query($link, $query)){
                        echo 'Last Name of the student changed Successfully!';
                    }else{
                        echo 'Failed!!!';
                    }
                } else {
                    echo 'The field cannot take an empty value';
                }

            } else {
                echo 'The field should be filled';
            }
            ?>
    </form>
</div>

<?php
    include 'Foot.php';
    ?>


