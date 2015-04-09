<?php
/**
 * Created by PhpStorm.
 * User: Cnitz
 * Date: 4/9/15
 * Time: 10:59 AM
 */

$link = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
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