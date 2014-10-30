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
     // Open a MySQL connection
        $sql = "SELECT FIRST,LAST FROM USERS WHERE SKILL_LEVEL=?";
        if($stmt = $link->prepare($sql)){
            $stmt->bind_param('i', $_POST['volunteer']);
            $stmt->execute();
            $stmt->bind_result($first, $last);
            while($stmt->fetch()) {
                printf("Volunteer: %s %s<br />", $first, $last);
            }
            $stmt->close();
        }
        else {
            ?>
            <form method="post">
                <label for="volunteer">Select a Volunteer:</label>
                <select name="volunteer">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="submit" />
            </form>
        <?php
        }
     }

?>