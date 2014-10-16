 <?php 
$con=mysqli_connect("128.46.116.11","LCCenter","LCC.team4","lcc");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
        echo "Connection Success!";


$result = mysql_query("SHOW COLUMNS FROM USERS");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        print_r($row);
    }
}


    mysqli_close($con);

?>