<?php
/**
 * Created by PhpStorm.
 * User: Cnitz
 * Date: 4/16/15
 * Time: 10:49 AM
 *
 *
 * The purpose of this file is run the scheduling algorithm. When this file is loaded
 * it will get its information from the SHIFTS and USER tables in the database.
 * It uses the information and creates the schedule and stores the results into the
 * table FUTURE_SCHEDULE.
 *
 * Skill Level:
 * 0 = Trainee
 * 1 = Normal Volunteer
 * 2 = Trainer
 *
 *
 * How it works:
 * 1. Fetches data from SHIFTS and stores corresponding information in a User class
 *  1.1. Fills an array with numbers that is used to limit the number of people working per shift.
 * 2. Then stores the User into a queue based on their skill level. e.g. 0,1,2
 * 3. Fetches information based on USER_ID from the USER database and populates the User class with a name
 * 4. Deletes all current values stored in FUTURE_SCHEDULE
 * 5. Then begins scheduling
 * 6. First it traverses the trainee and trainer queue and makes pairs and schedules them
 * 7. Then it traverses the other 3 queues based on priority starting with high -> low
 * 8. And schedules the first person it encounters if the shift is available
 * 9. Writes all information to the Future schedule table on the database
 */

                        $link = new mysqli("128.46.154.164", "disclcc", "C0mpact_DISC", "lcc");
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













                        }

                    ?>