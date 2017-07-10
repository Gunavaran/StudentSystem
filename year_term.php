<form action=yr.php.php" method="post">
<p>Year: <input type="text" name="Year"><br></p>
Term:</br>
    <input type="radio" name="term" value="01">I</br>
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