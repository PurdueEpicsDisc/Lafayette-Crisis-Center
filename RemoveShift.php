<form method="post">
    <label for="volunteer">Select skill level:</label>
    <select name="volunteer">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
    </select>
    <input type="submit" />
</form>

<?php
$link = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
if (!$link) {
    die("Connection failed: " . $mysqli->error());
}

function removeShift($firstName, $lastName, $shiftID)
{
    global $link;
    $userID= 50;
    $getID = "SELECT PRIMARY_ID FROM USERS where FIRST='$firstName' AND LAST='$lastName'";
    if($stmt = $link->prepare($getID)){
        $stmt->execute();
        $stmt->bind_result($userID);
        while($stmt->fetch()) {
            echo($userID);
        }
    }
    $stmt->close();
    
    $remove = "DELETE FROM SHIFTS where UserID='$userID' AND ShiftID='$shiftID'";
    if($stmt = $link->prepare($remove)){
        $stmt->execute();
    }
    $stmt->close();
}

if($_SERVER['REQUEST_METHOD']=='POST') {
    removeShift('Tim ', 'Vincent', '1');

}

?>
