 <?php 
$con=mysqli_connect("128.46.116.11","LCCenter","LCC.team4","lcc");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
        echo "Connection Success!";
?>
~
