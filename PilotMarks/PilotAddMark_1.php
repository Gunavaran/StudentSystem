<!DOCTYPE html>

<html>
<head>

    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type = "text/css" href = "../Styles/stylesheets.css"/>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="banner"></div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="../Templates/index.php"> Home </a> </li>
            <li> <a href="../Templates/ProfileTemplate.php">Profile</a></li>
            <li> <a href="../Templates/MarksTemplate.php">Marks</a></li>
            <li> <a href="../Templates/attendancetemplate.php">Attendance</a></li>
            <li> <a href="../Log_in_out/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <?php
        include '../Connect/Connect.php';
        $error=0;
        session_start();
        if (isset($_GET['serial_no']) AND isset($_GET['year'])){
            if(!empty($_GET['serial_no']) AND !empty($_GET['year'])){
                if($_GET['year'] !== (string)(int) $_GET['year']) {
                    $error++;
                    echo 'Year can only be number'.'<br>';
                }else if((int)$_GET['year']<1990 OR (int)$_GET['year']>date("Y")){
                    $error++;
                    echo 'Year should be in range 1991-'.date('Y').'<br>';
                }else{
                    $year=(int)$_GET['year'];
                    $_SESSION['year']=$year;

                }

                if($_GET['serial_no'] !== (string)(int) $_GET['serial_no'] AND (int)$_GET['serial_no']>0) {
                    $error++;
                    echo 'Serial Number should be a positive number'.'<br>';
                }else {
                    $serial = (int)$_GET['serial_no'];
                    $_SESSION['serial']=$serial;
                }
                if($error==0) {
                    $id_array = array();
                    $sql = "SELECT ID FROM detail WHERE Grade='5'";
                    $result = mysqli_query($link, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            array_push($id_array, $row['ID']);

                        }
                    }
                    $_SESSION['id_array']=$id_array;?>
                    <table style="width: 100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Part 1</th>
                                <th>Part 2</th>
                            </tr>
                                <?php
                    for ($i=0; $i<sizeof($id_array,1);$i++){
                    ?>
                        <form action="PilotAddMarks_2.php" method="get">
                            <tr>
                                <th><?php echo $id_array[$i]; ?></th>
                                <td><input type="text" name="<?php echo 'part1_'.$i; ?>" placeholder="Part-1"></td>
                                <td><input type="text" name="<?php echo 'part2_'.$i; ?>" placeholder="Part-2"></td>
                            </tr>

                            <?php
                    } ?>
                    </table><br><br>
                            <input type="submit" value="Submit"><br><br>
                        </form>


                        <?php
                }
            } else {
                echo 'None of the fields can take an empty value';
            }
        } else {
            echo 'All the required fields should be filled';
        }
        ?>

</div>

    <div id="sidebar">

    </div>
    <footer>
        <div class = 'footer1'>
            <h3 id="h3">Address</h3>
            J/St.John Bosco Vidyalayam,<br/>
            Racca Road, Jaffna.
        </div>
        <div class = 'footer2'>
            <h3 id="h3" >Contact Us</h3>
            Email : stjohnbosco@yahoo.com<br />
            Tel: Principal office: +940212222540
        </div>
        <div class = 'footer3'><i>copyright : Futura Labs</i></div>

    </footer>

</div>
</body>
</html>



