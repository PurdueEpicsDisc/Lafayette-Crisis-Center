<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lafayette Crisis Center time table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
    <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->

</head>
  <body>
  <div class="navbar navbar-default">
      <div class="dropdown">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed pull-left" type="button" data-toggle="dropdown" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bars-button">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </span>
          </button>
        </div>
          <ul class="dropdown-menu" id="navbar-main">
              <li><a href="help.html">Help</a></li>
              <li><a href="archive.html" id="archive">View Archived Data</a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li><a href="http://www.lafayettecrisiscenter.org" class="navbar-brand">MHACC</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Login.html" <span class="glyphicon glyphicon-log-in"></span>Login</a></li>
          </ul>
      </div>
  </div>


<div class="container">

<!-- Tables for Previous month schedule
================================================== -->
<div class="bs-docs-section">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1 id="tables">Schedule for <span id="pmonth">PMonth</span>
                    <script type="text/javascript">

                        var my_month=new Date();
                        var month_name=new Array(12);
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

                        document.getElementById("pmonth").innerHTML = month_name[my_month.getMonth()];

                         //switch(my_month.getMonth()){
                           //case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                            //week_4 = "";}

                    </script>
                </h1>
            </div>
            <div class="bs-component">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr> <!-- Should dynamically pull from SCHEDULE_KEY (ie the shift times may change), it's not -->
                        <th style="font-size: 25px">Week <span id="week" style="font-size: 28px">1</span></th>
                        <th>12 am - 8 am</th>
                        <th>8 am - 12 pm</th>
                        <th>12 pm - 4 pm</th>
                        <th>4 pm - 8 pm</th>
                        <th>8 pm - 12 am</th>

                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo "hello";  
                            if (isset($_POST['p'])) {
                                $week = $_POST['p'];
                                week($week);
                            }
                            function week($week){
                                $link = new mysqli("128.46.154.164", "disclcc", "C0mpact_DISC", "lcc");
                            echo "hello";  

                                if (!$link) {
                                                                echo "hello";  
                                    die("Connection failed: " . $mysqli->error());
                                }
                                $week = $week;
                                echo "hello";
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Navs
 ================================================== -->


<div class="row">
    <div class="col-lg-4">
        <div class="page_changer">
            <ul class="pagination pagination-sm">
                <li><button type ="button" onclick="decrement()">Prev</button></li>
                <li><button type ="button" onclick="increment()">Next</button></li>
            </ul>
            <script>
                var count = 1;
                function increment() {
                    ++count;
                    if(count > 4)
                        count = 1;
                    document.getElementById("week").innerHTML = count;
                    loadWeek(count);
                }
                function decrement() {
                    --count;
                    if(count < 1)
                        count = 4;
                    document.getElementById("week").innerHTML = count;
                    loadWeek(count);
                }
            </script>
        </div>
    </div>

</div>
<!-- Buttons
================================================== -->

<div class="row">
    <div class="col-lg-6">

        <p class="bs-component">
            <a href="volunteerscheduler.php" class="btn btn-success">Calendar</a>
        </p>


        <div style="margin-bottom: 15px;">
            <div class="btn-toolbar bs-component" style="margin: 0;">
                <div class="btn-group">
                    <a href="#" class="btn btn-info">Info</a>
                    <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                    <ul class="dropdown-menu">

                    <li><a href="#">Add Volunteer</a></li>
                        <li><a href="#">Edit Volunteer</a></li>
                        <li><a href="#">Remove Volunteer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>The php file used here doesn't dynamically match day with day of the week (ie 23rd of June is Monday)</p>
            <p>Made by <a href="http://epics.ecn.purdue.edu/disc/" rel="nofollow">EPICS-DISC </a>. Contact us at <a href="mailto:epics-disc@ecn.purdue.edu">epics-disc@ecn.purdue.edu</a>.</p>

        </div>
    </div>
</footer>


</div>


<script>
    $(document).ready(function(){
        $('td').click(
            function() {
                var $p = $(this).text();
                $('.modal').show();
                $('.modal-title').text($p);
            }
        );
        $('button').click(
            function(){
                $('.modal').hide();
            });
    });

</script>

<script>
function loadWeek (x) {
  $.post("weekly.php", {p: x}, function (res) {
     $('.bs-component tbody').html(res);
  });
}
$(function () {
  loadWeek (1);
});
</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>