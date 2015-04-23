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
                <h1 id="tables">Schedule for <span id="pmonth">February</span>
                    <script type="text/javascript">

                        var my_month= new Date();
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
                <table class="table table-striped table-hover " border="1">
                    <thead>

                    <tr>
                        <!--
                        <th style="font-size: 25px">Week of the<span id="week" style="font-size: 28px">1st</span></th>
                        <th>12 am - 4 am</th>
                        <th>4 am - 8 am</th>
                        <th>8 am - 12 pm</th>
                        <th>12 pm - 4 pm</th>
                        <th>4 pm - 8 pm</th>
                        <th>8 pm - 12 am</th>
                        -->
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tues</th>
                        <th>Wed</th>
                        <th>Thur</th>
                        <th>Fri</th>
                        <th>Sat</th>

                    </tr>
                    <tr>
                        <td id="1" ">Date TBD</td>
                        <td id="2">Date TBD</td>
                        <td id="3">Date TBD</td>
                        <td id="4">Date TBD</td>
                        <td id="5">Date TBD</td>
                        <td id="6">Date TBD</td>
                        <td id="7">Date TBD</td>


                    </tr>
                    <tr>
                        <td id="8">Date TBD</td>
                        <td id="9">Date TBD</td>
                        <td id="10">Date TBD</td>
                        <td id="11">Date TBD</td>
                        <td id="12">Date TBD</td>
                        <td id="13">Date TBD</td>
                        <td id="14">Date TBD</td>
                    </tr>
                    <tr>
                        <td id="15">Date TBD</td>
                        <td id="16">Date TBD</td>
                        <td id="17">Date TBD</td>
                        <td id="18">Date TBD</td>
                        <td id="19">Date TBD</td>
                        <td id="20">Date TBD</td>
                        <td id="21">Date TBD</td>
                    </tr>
                    <tr>
                        <td id="22">Date TBD</td>
                        <td id="23">Date TBD</td>
                        <td id="24">Date TBD</td>
                        <td id="25">Date TBD</td>
                        <td id="26">Date TBD</td>
                        <td id="27">Date TBD</td>
                        <td id="28">Date TBD</td>
                    </tr>
                    <tr>
                        <td id="29">Date TBD</td>
                        <td id="30">Date TBD</td>
                        <td id="31">Date TBD</td>
                        <td id="32">Date TBD</td>
                        <td id="33">Date TBD</td>
                        <td id="34">Date TBD</td>
                        <td id="35">Date TBD</td>
                    </tr>
                    <tr>
                        <td id="36">Date TBD</td>
                        <td id="37">Date TBD</td>
                        <td id="38">Date TBD</td>
                        <td id="39">Date TBD</td>
                        <td id="40">Date TBD</td>
                        <td id="41">Date TBD</td>
                        <td id="42">Date TBD</td>
                    </tr>
                    </thead>
                    <tbody>
                    <script type="text/javascript">
                        function returnArray() {
                            var day = new Date();
                            var month = day.getMonth()+1;
                            var year = day.getFullYear();
                            var startDay = new Date(year,month-1,1).getDay();
                            return startDay;
                        }
                    </script>

                    <?php
                        // formula for calculating start weekday of month
                        // https://cs.uwaterloo.ca/~alopez-o/math-faq/node73.html
                        $date = 1;
                        $isLeap = date("L");
                        $month = date("m");
                        $year = date("Y");

                        $digits = $year % 100;

                        $last = $digits;
                        $digits = $digits / 4;

                        $digits = $digits + $date;

                        // Month Key Value Dates: JFM AMJ JAS OND 144 025 036 146
                        if ($isLeap == 1) {
                            if ($month == 1 || $month == 2) {
                                $digits = $digits - 1;
                            }
                        }
                        switch ($month) {
                            case 1:
                                $digits = $digits + 1;
                                break;
                            case 2:
                                $digits = $digits + 4;
                                break;
                            case 3:
                                $digits = $digits + 4;
                                break;
                            case 4:
                                $digits = $digits + 0;
                                break;
                            case 5:
                                $digits = $digits + 2;
                                break;
                            case 6:
                                $digits = $digits + 5;
                                break;
                            case 7:
                                $digits = $digits + 0;
                                break;
                            case 8:
                                $digits = $digits + 3;
                                break;
                            case 9:
                                $digits = $digits + 6;
                                break;
                            case 10:
                                $digits = $digits + 1;
                                break;
                            case 11:
                                $digits = $digits + 4;
                                break;
                            case 12:
                                $digits = $digits + 4;
                                break;
                        }
                        // THIS HARDCODED VALUE WILL CHANGE IN THE YEAR January 1st, 2100
                        // What to change to: For a Gregorian date, add 0 for 1900's, 6
                        // for 2000's, 4 for 1700's, 2 for 1800's; for other years, add or
                        // subtract multiples of 400.
                        if ($year >= 2100) {
                            echo "ENTER SCHEDULER.PHP AND GO TO LINE NUMBER 233. NUMERICAL CALCULATION ERROR HAS OCCURRED. REFERENCE COMMENTS ON LINE NUMBERS 226-229";
                        }
                        $digits = $digits + 6; //Do not change line number without changing echo statement above

                        $digits = $digits + $last;

                        $day = $digits % 7;


                        // Sunday = 1, etc.


                    ?>
                    <script type="text/javascript">
                        // php_VARNAME grabs from PHP above this script
                        var php_date = "<?php echo $day; ?>";
                        var php_month = "<?php echo $month; ?>";
                        var php_isLeap = "<?php echo $isLeap; ?>";
                        var monthOver = 0;
                        var monthDates = 0;
                        // i runs through the element IDs of the month table
                        for (var i = 1; i < 43; i++) {
                            var name = i.toString();
                            // days prior to the start of the month
                            if (i < php_date) {
                                document.getElementById(name).innerHTML = "PREVIOUS MONTH";
                            }
                            // month starting
                            else {
                                monthDates += 1;
                                if (php_month == 1 || php_month == 3 || php_month == 5 || php_month == 7 || php_month == 8 || php_month == 10 || php_month == 12) {
                                    if (monthDates <= 31) {
                                        var day = monthDates.toString();
                                        document.getElementById(name).innerHTML = day;
                                    }
                                    else {
                                        document.getElementById(name).innerHTML = " ";
                                    }
                                }
                                else if (php_month == 4 || php_month == 6 || php_month == 9 || php_month == 11) {
                                    if (monthDates <= 30) {
                                        var day = monthDates.toString();
                                        document.getElementById(name).innerHTML = day;
                                    }
                                    else {
                                        document.getElementById(name).innerHTML = "              ";
                                    }
                                }
                                else if (php_month == 2) {
                                    if (php_isLeap == 1) {
                                        if (monthDates <= 29) {
                                            var day = monthDates.toString();
                                            document.getElementById(name).innerHTML = day;
                                        }
                                        else {
                                            document.getElementById(name).innerHTML = "              ";
                                        }
                                    }
                                    else {
                                        if (monthDates <= 28) {
                                            var day = monthDates.toString();
                                            document.getElementById(name).innerHTML = day;
                                        }
                                        else {
                                            document.getElementById(name).innerHTML = "              ";
                                        }
                                    }
                                }
                            }

                        }
                    </script>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Buttons
================================================== -->
<div class="container">
    <div class="col-lg-6">

        <p class="bs-component">
            <a href="addShift.html" class="btn btn-success">Add new Shifts</a>
            <a href="editShift.html" class="btn btn-warning">Edit Shifts</a>
            <a href="removeShift.html" class="btn btn-danger">Remove Shifts</a>
            <button onclick="schedule()" >Schedule</button>
            <button onclick="finalize()">Finalize</button>
            <script>
                function schedule() {
                    $.get("schedule_algorithm.php");
                    return false;
                }
            </script>
            <script>
                function finalize() {
                    $.get("FutureToCurrent.php");
                    return false;
                }
            </script>


        </p>


        <!--<div style="margin-bottom: 15px;">
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
        </div>-->
    </div>
</div>



<div class="bs-docs-section">

    <div class="row">
        <div class="col-lg-6">
            <div class="bs-component">

            </div>
        </div>
    </div>
</div>

<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="ajaxLoader">



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script>


    $(document).ready(function(){

        $('td').click(
            function() {
                var $p = $(this).text();
                if ($(this).text() != "PREVIOUS MONTH") {
                    $('.modal').show();
                    var php_date = "<?php $currentDay = date("j"); echo $currentDay; ?>";
                    var php_month = "<?php echo date("M"); ?>";
                    var php_year = "<?php echo $year; ?>";
                    var current = php_month + " " + $p + ", " + php_year;
                    $('.modal-title').text(current);
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("ajaxLoader").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "loadModal.php?sid=" + $p, true);
                    xmlhttp.send();
                }

            }
        );
        $('button').click(
            function(){
                $('.modal').hide();
            });
    });
</script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootswatch.js"></script>
</body>
</html>