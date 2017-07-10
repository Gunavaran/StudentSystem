<form action="yr.php" method="post">
<p>Year: <input type="text" name="Year"><br></p>
Term:</br>
    <input type="radio" name="term" value="01">I<br><br>
    <input type="radio" name="term" value="02">II</br>
    <input type="radio" name="term" value="03">III</br>

    <input type="radio" name="reason" value="Fit Description">Fit Description<br>
    <input type="radio" name="reason" value="Suspicious Behavior">Suspicious Behavior<br>
    <input type="radio" name="reason" value="No Reason Given">No Reason Given<br>
    <input type="radio" name="reason" value="">Other <input type="text" name="other_reason" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​

    <fieldset>
        <legend>Please select one of the following</legend>
        <input type="radio" name="track" id="track" value="track" />Track Submission<br />
        <input type="radio" name="event" id="event" value="event"  />Events and Artist booking<br />
        <input type="radio" name="message" id="message" value="" />Message us<input type="text" name="other_reason" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br />
    </fieldset>

    Choice 1: <input type="radio" name="choice" value="ch1"><br>
    Choice 2: <input type="radio" name="choice" value="ch2"><br>
    Choice 3: <input type="radio" name="choice" value="ch3" disabled><br>
    Choice 4: <input type="radio" name="choice" value="ch4"><br>

    <p> <input type="submit"></p>
    <input type="reset">
    <label for="Manufacturer"> Manufacturer : </label>
    <select id="cmbMake" name="Make" >
        <option value="0">Select Manufacturer</option>
        <option value="1">--Any--</option>
        <option value="2">Toyota</option>
        <option value="3">Nissan</option>
    </select>

    <form action="" method="get">
        <input type="radio" name="one" value="One1" />One1<br/>
        <input type="radio" name="one" value="One2" />One2 <br/>
        <input type="radio" name="one" value="One3" />One3<br/>
        <input type="submit" name="submit"/> <br/>
    </form>

    <input type="submit" name="search" value="Search"/
</form>

<form>
    <INPUT type="checkbox" name="chk_all" checked onClick="select_all(this,'ID_')"> All<br>
    <input type="checkbox" id="chk" name="ID_1" value="V1" checked onclick="update_disabled(this)" />
    <input type="text" id="txtOther_dis" disabled="disabled" class="dis" name="Other_1" size="20"><br>
    <input type="checkbox" id="chk" name="ID_2" value="V2" checked onclick="update_disabled(this)" />
    <input type="text" id="txtOther_dis" disabled="disabled" class="dis" name="Other_2" size="20"><br>
    <input type="checkbox" id="chk" name="ID_3" value="V3" checked onclick="update_disabled(this)" />
    <input type="text" id="txtOther_dis" disabled="disabled" class="dis" name="Other_3" size="20"><br>
</form>



<form action="submit.php">
    <p><input type="checkbox"> <label>Check All</label></p>
    <p><input type="checkbox" name="checkbox1" value="value1">
        <input type="text" name="text1"></p>
    <p><input type="checkbox" name="checkbox2" value="value2">
        <input type="text" name="text2"></p>
    <p><input type="checkbox" name="checkbox3" value="value3">
        <input type="text" name="text3"></p>
</form>


<form id="myForm" action="submit.php">
    <p><input type="checkbox"> <label>Check All</label></p>
    <p><input type="checkbox" name="checkbox1" class="toggle" value="value1">
        <input type="text" name="text1"></p>
    <p><input type="checkbox" name="checkbox2" class="toggle" value="value2">
        <input type="text" name="text2"></p>
    <p><input type="checkbox" name="checkbox3" class="toggle" value="value3">
        <input type="text" name="text3"></p>
</form>


<input class="radio" type="radio" name="alg_Type" id="HP" value="HP" onclick="location.href='../TermMarks/EnterMarks.php"/>  <label class="choice" for="HP">High precision</label>


<html>
<body>
<h4><b>Please choose one of the following options below : </b> </h4>
<input type="radio" name="option" value="search" onclick="document.location.href='hello.php'"/> Search <br/>
<input type="radio" name="option" value="open database" onclick="document.location.href='welcome.php'" /> Open Database<br/>
<input type="radio" name="option" value="administrative page " onclick="document.location.href='yr.php'"/> Administrative Page <br/>
</body>
</html>​