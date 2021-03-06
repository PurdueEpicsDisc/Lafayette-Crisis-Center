
<?php 
                        
    if (isset($_POST['p'])) {
        $week = $_POST['p'];
        week($week);
    }

    function week($week){
        $link = new mysqli("128.46.154.164", "disclcc", "C0mpact_DISC", "lcc");

        if (!$link) {
            die("Connection failed: " . $mysqli->error());
        }
        $week = $week;
        echo "hello"
        //Get Max Shift Id from Schedule Key
        $sql = "SELECT MAX(SHIFT_ID) AS max FROM SCHEDULE_KEY";
        $stmt = $link->prepare($sql);  //get max shift id int
        $stmt->execute();
        $stmt->bind_result($result);
        $stmt->store_result();
        $stmt->fetch();
        $large = $result;
        $stmt->close();

        $usersNames = new SplFixedArray(7);//rows of 7 aka days
        //intialize shift_count to equal # of shifts at a given index
        // where the index is the shift id

        $weekDays = array("Monday", "Tuesday", "Wednesday" , "Thursday" , "Friday" , "Saturday" , "Sunday");
        // Open a MySQL connection
        //WARNING: DOESN'T ACCOUNT FOR MULTIPLE VOLUNTEERS AT THE SAME SHIFT
        $sql = "SELECT FIRST,LAST FROM schedule WHERE day=? AND ShiftID=?";
            if($stmt = $link->prepare($sql)){
                $day = $week * 7 - 6;
                $end = 7 * $week;
                $row = 0;
                for ($i = $day; $i <= $end; $i++) {
                    $usersNames[$row] = new SplFixedArray($large);
                    for($j = 0; $j < $large; $j++) {
                        $stmt->bind_param('ii',$i,$j);
                        $stmt->execute();
                        $stmt->bind_result($first, $last);
                        if($stmt->fetch()) {
                            $usersNames[$row][$j] = $first." ".$last;
                        }
                        else {
                            $usersNames[$row][$j] = 'N/A';
                        }
                    }
                    $row++;
                }
                $stmt->close();
            }

        //Echo out weekly schedule for scheduler.php    
        for ($i = 0; $i < 7; $i++) {
            echo "<tr><td>$weekDays[$i]</td>";
            for ($j = 0; $j < 5; $j++) {
                echo "<td><p>".$usersNames[$i][$j]."</p></td>";
            }
            echo"</tr>";
        }
        
    } 
?>