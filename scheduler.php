<?php
/**
 * Created by PhpStorm.
 * User: Honey Singh
 * Date: 10/16/2014
 * Time: 11:16 AM
 */
mysql_connect("128.46.116.11","LCCenter","LCC.team4","lcc")
or die("could not");

mysql_select_db('lcc');

function show(){
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
}

function addUser($firstName, $lastName, $skillLevel)
{
    $sql = "INSERT INTO USERS(['FIRST'], ['LAST'], ['SKILL LEVEL'])
    VALUES ($firstName, $lastName, $skillLevel)";
    printf("done: %s %s %d", $firstName,$lastName,$skillLevel);
}



addUser('John', 'Doe', 2);
mysql_close();

?>