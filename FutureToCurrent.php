<?php
/**
 * Created by PhpStorm.
 * User: Cnitz
 * Date: 4/9/15
 * Time: 10:59 AM
 */

/**
 * This file transfers the information in FUTURE_SCHEDULE and transfers it to CURRENT_SCHEDULE
 * CURRENT_SCHEDULE holds the schedule that is displayed on the front end.
 * FUTURE_SCHEDULE holds the schedule that has been made by schedule_algorithm
 */

$link = new mysqli("128.46.154.164", "disclcc", "C0mpact_DISC", "lcc");
if(!$link)
{
    die("Connection failed: " . $link->error());
}


function future_to_current()
{
    global $link;
    $sql = "DELETE FROM CURRENT_SCHEDULE";
    if($stmt = $link->prepare($sql)){
        $stmt->execute();

    }
    $stmt->close();


    $sql = "INSERT INTO CURRENT_SCHEDULE SELECT * FROM FUTURE_SCHEDULE";
    if($stmt = $link->prepare($sql)) {
        $stmt->execute();
        $stmt->close();
    }
    else
    echo "hih";
}

future_to_current();

$link->close();

?>