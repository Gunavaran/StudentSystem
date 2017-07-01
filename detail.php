<?php

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "table";

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db) or die("could not connect");

$id = $_POST['id'];
$sql = "SELECT * FROM student WHERE student.Student_Id=$id";
$result = $conn->query($sql);
if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        extract($row);
        ?>
        <table>
            <tbody>
            <tr>
                <td>Student ID</td>
                <td><?php echo $row["Student_Id"]; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $row["Name"]; ?></td>
            </tr>
            <tr>
                <td>Grade</td>
                <td><?php echo $row["Grade"]; ?></td>
            </tr>
            <tr>
                <td>Class</td>
                <td><?php echo $row["Division"]; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $row["Address"]; ?></td>
            </tr>
            </tbody>
        </table>
        <?php
    }//while
}//if
?>