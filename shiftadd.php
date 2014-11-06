<?php
/**
 * Created by PhpStorm.
 * User: Honey Singh
 * Date: 10/16/2014
 * Time: 11:16 AM
 * Adding shifts.
 */
$link = new mysqli("128.46.116.11","LCCenter","LCC.team4","lcc");
if(!$link)
{
    die("Connection failed: " . $link->error());
}


function addShift($user, $shift, $priority)
{
    global $link;
    $sql = "INSERT INTO SHIFTS(PRIMARY_ID, UserID, ShiftID, Priority)
    VALUES (NULL,$user, $shift, $priority)";
    if($stmt = $link->prepare($sql))
    {
        $stmt->execute();
    }
    $stmt->close();
}
addShift(7, 2, 2);

$link->close()

?>