<?php
$link = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
if (!$link) {
    die("Connection failed: " . $mysqli->error());
}
    /**$users init to size of shifts change 42 **/
    $users = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $priorities= array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $usersNames = array("", "", "", "", "", "", "", "", "", "", "", "", "");

    // Open a MySQL connection
    $sql = "SELECT * FROM SHIFTS ";
    if($stmt = $link->prepare($sql)){
        $stmt->execute();
        $stmt->bind_result($id, $userID, $shiftID , $priority);
        while($stmt->fetch()) {
            if($priority > $priorities[$shiftID]){
                $users[$shiftID] = $userID;
                $priorities[$shiftID] = $priority;
            }
        }
        $stmt->close();

        /* Convert userID -> Last, First */
        for($i = 0; $i < 13; $i++) {
            if($users[$i] != 0 && $priorities[$i] != 0) {
                $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=$users[$i]";
                if($stmt = $link->prepare($sql)) {
                    $stmt->execute();
                    $stmt->bind_result($first, $last);
                    while($stmt->fetch()) {
                        $usersNames[$i] = $last.", ".$first;
                    }
                        $stmt->close();
                }

            }
        }

        for($i = 0; $i < 13; $i++) {
            echo("--------------\n");
            echo($usersNames[$i]);
            echo("\n");
            echo("--------------\n");

        }
        echo("Done\n");

    }

?>