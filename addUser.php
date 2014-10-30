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
if($_SERVER['REQUEST_METHOD']=='POST') {
    addUser('slardy ', 'blardfest', '2');

}


function addUser($firstName, $lastName, $skillLevel)
{
    global $link;
    $sql = "INSERT INTO USERS (PRIMARY_ID, FIRST, LAST, SKILL_LEVEL) VALUES (NULL, '$firstName', '$lastName', '$skillLevel')";
    if($stmt = $link->prepare($sql)){
        $stmt->execute();
    }
    $stmt->close();
}
?>