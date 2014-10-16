 <?php
 mysql_connect("128.46.116.11","LCCenter","LCC.team4","lcc")
 or die("could not");

 mysql_select_db('lcc');
 $result = mysql_query("SELECT * FROM USERS");
 if (!$result) {
     echo 'Could not run query: '. mysql_error();
     exit;
 }
 while($row = mysql_fetch_array($result)) {
     echo $row['PRIMARY ID']." ".$row['FIRST']." ".$row['LAST']." ".$row['SKILL LEVEL'];
     echo "<br>";
 }
 if (mysql_num_rows($result) > 0) {
     while ($row = mysql_fetch_assoc($result)) {
         print_r($row);
     }
 }

 mysql_close();


?>