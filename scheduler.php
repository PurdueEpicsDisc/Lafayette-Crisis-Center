 <?php 
mysqli_connect("128.46.116.11","LCCenter","LCC.team4","lcc")
    or die ("Could not connect"); 

mysql_select_db('lcc');

$result = mysql_query("SELECT 'PRIMARY ID' FROM USERS");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        print_r($row);
    }
}


    mysqli_close();

?>