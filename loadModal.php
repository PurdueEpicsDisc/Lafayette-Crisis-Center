<!-- For any questions regarding this code, contact:
    Pedro Del Moral Lopez
    513-284-5722
    pdelmora@purdue.edu
    -->
<div class="shift1">
    <table id="hours1", border="1">
        <thead>
            <h2 class="modal-title"><?php echo date("M") . " " . $_GET["sid"] . " " . date("Y")?></h2>
            <tr id="h1"><h4>12 AM - 8 AM</h4></tr>
            <hr>
            <?php

            // Create connection
            $conn = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $check = 0;
            $sql = "SELECT ShiftID, FIRST, LAST FROM CURRENT_SCHEDULE";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row["ShiftID"] == $_GET["sid"]) {
                        $check = 1;
                        echo  "<p>Name: " . $row["FIRST"]. " " . $row["LAST"]. "</p><br>";
                    }

                }
                if ($check == 0)
                    echo "<p>No Volunteer Registered</p>";
            } else {
                echo "No Volunteer Registered";
            }
            $conn->close();
            ?>
            <br>
            <tr id="h1"><h4>8 AM - 12 PM</h4></tr>
            <hr>
            <?php

            // Create connection
            $conn = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $check = 0;
            $sql = "SELECT ShiftID, FIRST, LAST FROM CURRENT_SCHEDULE";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row["ShiftID"] == $_GET["sid"]) {
                        $check = 1;
                        echo  "<p>Name: " . $row["FIRST"]. " " . $row["LAST"]. "</p><br>";
                    }

                }
                if ($check == 0)
                    echo "<p>No Volunteer Registered</p>";
            } else {
                echo "No Volunteer Registered";
            }
            $conn->close();
            ?>
            <br>
            <tr id="h1"><h4>12 PM - 4 PM</h4></tr>
            <hr>
            <?php

            // Create connection
            $conn = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $check = 0;
            $sql = "SELECT ShiftID, FIRST, LAST FROM CURRENT_SCHEDULE";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row["ShiftID"] == $_GET["sid"]) {
                        $check = 1;
                        echo  "<p>Name: " . $row["FIRST"]. " " . $row["LAST"]. "</p><br>";
                    }

                }
                if ($check == 0)
                    echo "<p>No Volunteer Registered</p>";
            } else {
                echo "No Volunteer Registered";
            }
            $conn->close();
            ?>
            <br>
            <tr id="h1"><h4>4 PM - 8 PM</h4></tr>
            <hr>
            <?php

            // Create connection
            $conn = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $check = 0;
            $sql = "SELECT ShiftID, FIRST, LAST FROM CURRENT_SCHEDULE";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row["ShiftID"] == $_GET["sid"]) {
                        $check = 1;
                        echo  "<p>Name: " . $row["FIRST"]. " " . $row["LAST"]. "</p><br>";
                    }

                }
                if ($check == 0)
                    echo "<p>No Volunteer Registered</p>";
            } else {
                echo "No Volunteer Registered";
            }
            $conn->close();
            ?>
            <br>
            <tr id="h1"><h4>8 PM - 12 AM</h4></tr>
            <hr>
            <?php

            // Create connection
            $conn = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $check = 0;
            $sql = "SELECT ShiftID, FIRST, LAST FROM CURRENT_SCHEDULE";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row["ShiftID"] == $_GET["sid"]) {
                        $check = 1;
                        echo  "<p>Name: " . $row["FIRST"]. " " . $row["LAST"]. "</p><br>";
                    }

                }
                if ($check == 0)
                    echo "<p>No Volunteer Registered</p>";
            } else {
                echo "No Volunteer Registered";
            }
            $conn->close();
            ?>
            <br>
            <script type="text/javascript">
                var month_name[12] = new Array(12);
                month_name[0]="January";
                month_name[1]="February";
                month_name[2]="March";
                month_name[3]="April";
                month_name[4]="May";
                month_name[5]="June";
                month_name[6]="July";
                month_name[7]="August";
                month_name[8]="September";
                month_name[9]="October";
                month_name[10]="November";
                month_name[11]="December";
                var php_date = "<?php $currentDay = date("j"); echo $currentDay; ?>";
                var php_month = "<?php echo $month; ?>";
                var php_year = "<?php echo $year; ?>";
                var inner = "<h1>" + month_name[php_month] + php_date.toString() + "," + php_year.toString() + "</h1><tr id=\"h1\"><h4>12 AM - 8 AM</h4></tr><hr><p>Instructor: John Jacob</p><p>Trainee: James Williams</p><br>";
                alert(inner);
                document.getElementById("hours1").innerHTML = inner;
            </script>
        </thead>
    </table>

</div>
<script>

</script>

<?php
/**
 * Created by PhpStorm.
 * User: Pedro Del Moral
 * Date: 4/2/2015
 * Time: 9:56 PM
 */
?>