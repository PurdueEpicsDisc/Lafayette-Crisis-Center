<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lafayette Crisis Center time table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap.css" media="screen">
    <link rel="stylesheet" href="./bootswatch.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
    <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="http://www.lafayettecrisiscenter.org" class="navbar-brand">LCC</a>
            <!--<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>-->
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../help/">Help</a>
                </li>
                <li>
                    <a href="" id="archive">View Archived Data</a>
                </li>
            </ul>
        </div>
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

                        // switch(my_month.getMonth()){
                        //   case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                        //     week_4 = "";}

                    </script>
                </h1>
            </div>
            <div class="bs-component">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th style="font-size: 25px">Week <span id="week" style="font-size: 28px">1</span></th>
                        <th>12 am - 4 am</th>
                        <th>4 am - 8 am</th>
                        <th>8 am - 12 pm</th>
                        <th>12 pm - 4 pm</th>
                        <th>4 pm - 8 pm</th>
                        <th>8 pm - 12 am</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $link = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
                        if (!$link) {
                            die("Connection failed: " . $mysqli->error());
                        }
                        /**$users init to size of shifts change 42 **/
                        $users = new SplFixedArray(42);
                        $priorities= new SplFixedArray(42);
                        $usersNames = new SplFixedArray(42);
                        $weekDays = array("Monday", "Tuesday", "Wednesday" , "Thursday" , "Friday" , "Saturday" , "Sunday");

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
                        for($i = 0; $i < 42; $i++) {
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

                        for ($i = 0; $i < 7; $i++) {
                            echo "<tr><td>$weekDays[$i]</td>";
                                for ($j = 0; $j < 6; $j++) {
                                    $idx = ($i * 6) + $j;
                                    echo "<td><p>$usersNames[$idx]</p></td>";
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
                <li><a href="#" onclick="decrement()">&laquo;</a></li>
                <li><a href="#" onclick="decrement()">Prev</a></li>
                <li><a href="#" onclick="increment()">Next</a></li>
                <li><a href="#" onclick="increment()">&raquo;</a></li>
            </ul>
            <script>
                var count = 1;
                function increment() {
                    ++count;
                    if(count > 4)
                        count = 1;
                    document.getElementById("week").innerHTML = count;
                }
                function decrement() {
                    --count;
                    if(count < 1)
                        count = 4;
                    document.getElementById("week").innerHTML = count;
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
            <a href="#" class="btn btn-success">Add new Volunteer</a>
            <a href="#" class="btn btn-warning">Edit Volunteer</a>
            <a href="#" class="btn btn-danger">Remove Volunteer</a>
        </p>


        <div style="margin-bottom: 15px;">
            <div class="btn-toolbar bs-component" style="margin: 0;">
                <div class="btn-group">
                    <a href="#" class="btn btn-info">Info</a>
                    <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                    <ul class="dropdown-menu">

                    <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="bs-docs-section">

    <div class="row">
        <div class="col-lg-6">
            <div class="bs-component">
                <div class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Name</h4>
                            </div>
                            <div class="modal-body">
                                <p>Telephone:</p>
                                <p>E-mail:</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Name</h4>
            </div>
            <div class="modal-body">
                <p>Telephone:</p>
                <p>E-mail:</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="row">
        <div class="col-lg-12">

            <p>Made by <a href="http://epics.ecn.purdue.edu/disc/" rel="nofollow">EPICS-DISC </a>. Contact us at <a href="mailto:epics-disc@ecn.purdue.edu">epics-disc@ecn.purdue.edu</a>.</p>

        </div>
    </div>

</footer>


</div>


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootswatch.js"></script>
</body>
</html>