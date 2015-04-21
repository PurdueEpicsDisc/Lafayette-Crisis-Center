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
                    <?php
                        $link = new mysqli("128.46.116.11", "LCCenter", "LCC.team4", "lcc");
                        if (!$link) {
                            die("Connection failed: " . $mysqli->error());
                        }
                        /**$users init to size of shifts change 42 **/
                        $SHIFTS_PER_DAY = 5;  // dynamically get a number from a GUI that is editable by LCC admins
                        $DAYS = 31;
                        $shifts = $SHIFTS_PER_DAY * $DAYS;

                        $users = new SplFixedArray(42);
                        $priorities= new SplFixedArray(42);
                        $usersNames = new SplFixedArray($shifts);
                        $shift_count = new SplFixedArray($shifts);
                        $user_shifts = array();

                        //intialize shift_count to equal # of shifts at a given index
                        // where the index is the shift id

                        for($i = 0; $i < $shifts; $i++){

                            $shift_count[$i] = 2; // change to dynamic, hardcoded for testing

                        }


                       // $number_of_rows = mysqli_stmt_num_rows($stmt);
                       // $Schedule = new SplFixedArray($number_of_rows);



                    class date_n_time{
                        private $date;
                        private $shiftID;
                        private $start;
                        private $end;

                        private function __construct($date, $shiftID, $start, $end){
                            $this->shiftId = $shiftID;
                            $this->date = $date;
                            $this->start = $start;
                            $this->end = $end;
                        }

                        public function get_date() {return $this->date;}
                        public function get_shiftID() {return $this->shiftID;}
                        public function get_start() {return $this->start;}
                        public function get_end() {return $this->end;}


                    }



                        class User {
                            private $id;
                            private $userID;
                            private $shiftID;
                            private $priority;
                            private $scheduled;
                            private $last_name;
                            private $first_name;
                            private $named;

                        public function __construct($userID, $shiftID, $priority)  {
                            $this->userID = $userID;
                            $this->shiftID = $shiftID;
                            $this->priority = $priority;
                            $this->scheduled = false;
                            $this->named = false;

                        }
                            public function set_name($first, $last){
                                $this->first_name = $first;
                                $this->last_name = $last;
                            }
                            public function get_id(){
                                return $this->id;
                            }
                            public function get_shiftID(){
                                return $this->shiftID;
                            }
                            public function get_priority(){
                                return $this->priority;
                            }
                            public function schedule(){
                                $scheduled = true;
                            }
                            public function isScheduled(){
                                return $this->scheduled;
                            }
                            public function named(){
                                $this->named = true;
                            }



                            public function get_last_name(){
                                return $this->last_name;
                            }

                            public function get_first_name(){
                                return $this->first_name;
                            }
                            public function get_userID(){
                                return $this->userID;
                            }
                            public function get_name(){
                                return "$this->last_name".", "."$this->first_name";
                            }


                        }

                        function new_user($id, $shiftID, $priority){
                            return new User($id, $shiftID, $priority);
                        }

                        $TRAINER = 2;
                        $TRAINEE = 0;


                        $users_High = new SplQueue();
                        $users_Med = new SplQueue();
                        $users_Low = new SplQueue();
                        $users_Trainee = new SplQueue();
                        $users_Trainer = new SplQueue();


                    $weekDays = array("Monday", "Tuesday", "Wednesday" , "Thursday" , "Friday" , "Saturday" , "Sunday");

                        // Open a MySQL connection

                        $sql = "SELECT * FROM SHIFTS ";

                        if($stmt = $link->prepare($sql)){
                            $stmt->execute();
                            $stmt->bind_result($id, $userID, $shiftID , $priority, $skill_level);
                            $number_of_rows = mysqli_stmt_num_rows($stmt);
                            $Schedule = new SplFixedArray($number_of_rows);



                        /*
                         * Parses the SHIFTS database and sorts into 5 queues
                         * Trainer, Trainee, Low, Med, High
                         */

                        while($stmt->fetch()) {


                            if($skill_level == $TRAINER) {

                                $users_Trainer->enqueue(new_user($userID, $shiftID, $priority));
                            }
                            if($skill_level == $TRAINEE){
                                $users_Trainee->enqueue(new_user($userID, $shiftID, $priority));
                                continue;
                            }

                            switch($priority) {

                                case 1:
                                    $users_Low->enqueue(new_user($userID, $shiftID, $priority));
                                    break;

                                case 2:
                                    $users_Med->enqueue(new_user($userID, $shiftID, $priority));
                                    break;

                                case 3:
                                    $users_High->enqueue(new_user($userID, $shiftID, $priority));
                                    break;

                            }

                        }
                        $stmt->close();

                            $array = array();

                            $kTrainees = $users_Trainee->count();
                          //  printf("%d\n", $kTrainees);
                           for ($j = 0; $j < $kTrainees; $j++) {
                                    $trainee = $users_Trainee->dequeue();
                                    array_push($array, $trainee->get_userID());
                                    $users_Trainee->enqueue($trainee);
                                    //printf("%d\n",$array[$j]);

                           }

                        /*
                         * Lets play the name game....
                         */
                            //Trainiee name assigner

                            $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=?";
                            if($stmt = $link->prepare($sql)){



                           //     printf("%d\n", $kTrainees);
                                for ($i = 0; $i < $kTrainees; $i++) {
                                    $stmt->bind_param('i', $array[$i]);
                                    $stmt->execute();
                                    $stmt->bind_result($first, $last);
                                    $stmt->fetch();
                                    $trainee = $users_Trainee->dequeue();
                                    //printf(nl2br("volunteer: %s %s\n"), $first, $last);

                                    if($trainee->named())
                                        $users_Trainee->enqueue($trainee);
                                    else {
                                        $trainee->set_name($first, $last);
                                        $users_Trainee->enqueue($trainee);
                                        }

                                }
                                $stmt->close();
                            }




                            //TRIANERR!!!!!!!!!!!!!!!


                            $array = array();

                            $kTrainers = $users_Trainer->count();
                           // printf("%d\n", $kTrainers);
                            for ($j = 0; $j < $kTrainers; $j++) {
                                $trainer = $users_Trainer->dequeue();
                                array_push($array, $trainer->get_userID());
                                $users_Trainer->enqueue($trainer);
                                //printf("%d\n",$array[$j]);

                            }







                            $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=?";
                            if($stmt = $link->prepare($sql)){



                             //   printf("%d\n", $kTrainers);
                                for ($i = 0; $i < $kTrainers; $i++) {
                                    $stmt->bind_param('i', $array[$i]);
                                    $stmt->execute();
                                    $stmt->bind_result($first, $last);
                                    $stmt->fetch();
                                    $trainer = $users_Trainer->dequeue();
                                    //printf(nl2br("volunteer: %s %s\n"), $first, $last);

                                    if($trainer->named())
                                        $users_Trainer->enqueue($trainer);
                                    else {
                                        $trainer->set_name($first, $last);
                                        $users_Trainer->enqueue($trainer);
                                    }

                                }
                                $stmt->close();
                            }

                            //LOW PRIOR USERS!!!!!!!!!!!!!!!!
                            $array = array();

                            $kLow = $users_Low->count();
                           // printf("%d\n", $kLow);
                            for ($j = 0; $j < $kLow; $j++) {
                                $trainee = $users_Low->dequeue();
                                array_push($array, $trainee->get_userID());
                                $users_Low->enqueue($trainee);
                                //printf("%d\n",$array[$j]);

                            }





                            $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=?";
                            if($stmt = $link->prepare($sql)){



                                //printf("%d\n", $kLow);
                                for ($i = 0; $i < $kLow; $i++) {
                                    $stmt->bind_param('i', $array[$i]);
                                    $stmt->execute();
                                    $stmt->bind_result($first, $last);
                                    $stmt->fetch();
                                    $trainee = $users_Low->dequeue();
                                    //printf(nl2br("volunteer: %s %s\n"), $first, $last);

                                    if($trainee->named())
                                        $users_Low->enqueue($trainee);
                                    else {
                                        $trainee->set_name($first, $last);
                                        $users_Low->enqueue($trainee);
                                    }

                                }
                                $stmt->close();
                            }


                            $array = array();

                            $kMed = $users_Med->count();
                            //printf("%d\n", $kMed);
                            for ($j = 0; $j < $kMed; $j++) {
                                $trainee = $users_Med->dequeue();
                                array_push($array, $trainee->get_userID());
                                $users_Med->enqueue($trainee);
                                //printf("%d\n",$array[$j]);

                            }

                            $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=?";
                            if($stmt = $link->prepare($sql)){



                             //   printf("%d\n", $kMed);
                                for ($i = 0; $i < $kMed; $i++) {
                                    $stmt->bind_param('i', $array[$i]);
                                    $stmt->execute();
                                    $stmt->bind_result($first, $last);
                                    $stmt->fetch();
                                    $trainee = $users_Med->dequeue();
                                    //printf(nl2br("volunteer: %s %s\n"), $first, $last);

                                    if($trainee->named())
                                        $users_Med->enqueue($trainee);
                                    else {
                                        $trainee->set_name($first, $last);
                                        $users_Med->enqueue($trainee);
                                    }

                                }
                                $stmt->close();
                            }


                            $array = array();

                            $kHigh = $users_High->count();
                          //  printf("%d\n", $kHigh);
                            for ($j = 0; $j < $kHigh; $j++) {
                                $trainee = $users_High->dequeue();
                                array_push($array, $trainee->get_userID());
                                $users_High->enqueue($trainee);
                                //printf("%d\n",$array[$j]);

                            }

                            $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=?";
                            if($stmt = $link->prepare($sql)){



                           //     printf("%d\n", $kHigh);
                                for ($i = 0; $i < $kHigh; $i++) {
                                    $stmt->bind_param('i', $array[$i]);
                                    $stmt->execute();
                                    $stmt->bind_result($first, $last);
                                    $stmt->fetch();
                                    $trainee = $users_High->dequeue();
                                    //printf(nl2br("volunteer: %s %s\n"), $first, $last);

                                    if($trainee->named())
                                        $users_High->enqueue($trainee);
                                    else {
                                        $trainee->set_name($first, $last);
                                        $users_High->enqueue($trainee);
                                    }

                                }
                                $stmt->close();
                            }







                            /*
                             * Method to first find trainer-trainee pairs and schedule them together.
                             *
                             */


                            $nTrainers = $users_Trainer->count();
                            $kTrainees = $users_Trainee->count();
                            $FIFO_Trainee;
                            $check = false;


                            $sql = "DELETE FROM FUTURE_SCHEDULE";
                            if($stmt = $link->prepare($sql)){
                                $stmt->execute();

                            }
                            $stmt->close();


                            for ($i = 0; $i < $nTrainers; $i++) {
                                $trainer = $users_Trainer->dequeue();
                                $check = false;

                                for ($j = 0; $j < $kTrainees; $j++) {
                                      $trainee = $users_Trainee->dequeue();
                                    if($trainer->get_shiftID() == $trainee->get_shiftID() && $trainee->isScheduled() == false) {
                                        if(!$check){
                                            $check = true;
                                            $FIFO_Trainee = $trainee;
                                        }
                                        else if($FIFO_Trainee->get_priority() < $trainee->get_priority()){
                                            $FIFO_Trainee = $trainee;
                                        }

                                    }
                                    $users_Trainee->enqueue($trainee);
                                }
                                if($shift_count[$trainer->get_shiftID()] > 0){
                                    $shift_count->offsetSet($trainer->get_shiftID(), $shift_count[$trainer->get_shiftID()] - 1);
                                    array_push( $user_shifts, $trainer);
                                    array_push ($user_shifts, $FIFO_Trainee);

                                    $trainer->schedule();
                                    $FIFO_Trainee->schedule();
                                }
                                $FIFO_Trainee = null;
                            }


                                for($i = 0; $i < $kHigh; $i++){
                                    $user = $users_High->dequeue();
                                    if($shift_count[$user->get_shiftID()] > 0 ) {
                                        $shift_count->offsetSet($user->get_shiftID(), $shift_count[$user->get_shiftID()] - 1);
                                        array_push($user_shifts, $user);
                                        $user->schedule();
                                    }
                                }

                                for($i = 0; $i < $kMed; $i++){
                                    $user = $users_Med->dequeue();
                                    if($shift_count[$user->get_shiftID()] > 0 ) {
                                        $shift_count->offsetSet($user->get_shiftID(), $shift_count[$user->get_shiftID()] - 1);
                                        array_push($user_shifts, $user);
                                        $user->schedule();
                                    }
                                }

                                for($i = 0; $i < $kLow; $i++){
                                    $user = $users_Low->dequeue();
                                    if($shift_count[$user->get_shiftID()] > 0 ) {
                                        $shift_count->offsetSet($user->get_shiftID(), $shift_count[$user->get_shiftID()] - 1);
                                        array_push($user_shifts, $user);
                                        $user->schedule();
                                    }
                                }

                            //Push to the database and store the users scheduled at shift location.


                            $sql = "INSERT INTO FUTURE_SCHEDULE(ShiftID, UserID, FIRST, LAST) VALUES(?, ?, ?, ?)";
                            if($stmt = $link->prepare($sql)){



                                $count = count($user_shifts);
                                for ($i = 0; $i < $count; $i++) {

                                    $stmt->bind_param('iiss', $user_shifts[$i]->get_shiftID(), $user_shifts[$i]->get_userID(),
                                            $user_shifts[$i]->get_first_name(), $user_shifts[$i]->get_last_name());
                                    $stmt->execute();


                                }
                                $stmt->close();
                            }










                                //echo $usersNames[0]->get_userID();



                        /* Convert userID -> Last, First
                        for($i = 0; $i < 3; $i++) {
                                $ids = $users_High->dequeue();
                                $hold = "SELECT UserID, ShiftID FROM SHIFTS WHERE PRIMARY_ID=$ids";
                                if($stmt = $link->prepare($hold)){
                                $stmt->execute();
                                $stmt->bind_result($user_ID, $shift_ID);
                                $stmt->fetch();
                            }
                                $sql = "SELECT FIRST,LAST FROM USERS WHERE PRIMARY_ID=$user_ID";

                            $stmt->close();
                                if($stmt = $link->prepare($sql)) {
                                    $stmt->execute();
                                    $stmt->bind_result($first, $last);
                                $stmt->fetch();
                                    echo $last;
                                    $usersNames[$shift_ID] = $last.", ".$first;

                                $stmt->close();

                            }
                        }
                            */

                        for ($i = 0; $i < 7; $i++) {
                            //echo "<tr><td>$weekDays[$i]</td>";
                                for ($j = 0; $j < 6; $j++) {
                                    $idx = ($i * 6) + $j;
                                   // echo "<td><p>$usersNames[$idx]</p></td>";
                                }
                                //echo"</tr>";
                            }
                        }

                    ?>

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