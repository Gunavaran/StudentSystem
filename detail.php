<?php
require 'Connect/Connect.php';
if ($link || mysqli_select_db($link,$database)){
    //echo "Connection successful;";
} else {
    echo "connection failed";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM detail WHERE ID=$id";
    $result = mysqli_query($link, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
            ?>
            <table>
                <tbody>
                <tr>
                    <td>Student ID</td>
                    <td><?php echo $row["ID"]; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $row["First_name"]; ?></td>
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
        }
    }
}
?>