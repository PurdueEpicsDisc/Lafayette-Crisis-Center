<?php
/**
 * Created by PhpStorm.
 * User: Honey Singh
 * Date: 10/16/2014
 * Time: 11:16 AM
 * Adding shifts.
 */
$link = new mysqli("128.46.116.11","disclcc","C0mpact_DISC","lcc");
if(!$link)
{
    die("Connection failed: " . $link->error());
}


function addShift($user, $shift, $priority)
{
    global $link;
    $skill_level = 0;

    //Find skill level of user
    $sql = "SELECT SKILL_LEVEL FROM USERS WHERE UserID = $user";
    if($stmt = $link->prepare($sql)){
        $stmt->execute();
        $stmt->bind_result($skill_level);
        $stmt->close();
    }

    //Insert values into SHIFTS database
    $sql = "INSERT INTO SHIFTS(PRIMARY_ID, UserID, ShiftID, Priority, skill_level)
    VALUES (NULL,$user, $shift, $priority, $skill_level)";
    if($stmt = $link->prepare($sql))
    {
        $stmt->execute();
    }
    $stmt->close();
}
addShift(7, 2, 2);

$link->close()

?>