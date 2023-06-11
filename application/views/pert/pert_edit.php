<div class="inputpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Project Evaluation Review Technique (PERT)</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>PERT calculates three time estimates for each activity: optimistic, pessimistic, and most likely.
                        <br>These estimates are then used to calculate the expected time for each activity and the entire project.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid-container">
            <div class="tablecontainer" style="overflow-x:auto;">
                <table class="results">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th title="Activity Name">Name </th>
                            <th title="Activity Description">Description </th>
                            <th title="Shortest Estimated Activity Duration">Optimistic </th>
                            <th title="Reasonable Estimated Activity Duration">Most Likely </th>
                            <th title="Maximum Estimated Activity Duration">Pessimistic </th>
                            <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="<?php echo base_url('pert/calculate') ?>" method="post">
                        <?php
                            $project = $_SESSION['project'];
                            foreach ($project as $task) {
                                $i = $task['taskid'];
                        ?>
                                <tr>
                                    <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                                    <td>
                                        <input type="text" name="task_name_<?php echo $i; ?>" id="task_name_<?php echo $i; ?>" value="<?php echo $task['name']; ?>">
                                        <input type="number" name="proj_len" value="<?php echo $task['pqty']; ?>" hidden>
                                        <input type="text" name="unit" value="<?php echo $task['unit']; ?>" hidden>
                                        <input type="text" name="ProjectID" value="<?php echo $task['ProjectID']; ?>" hidden>
                                        <input type="text" name="RecordID_<?php echo $i; ?>" value="<?php echo $task['RecordID']; ?>" hidden>
                                    </td>
                                    <td><input type="text" name="task_desc_<?php echo $i; ?>" id="task_desc_<?php echo $i; ?>" value="<?php echo $task['desc']; ?>"></td>
                                    <td><input type="number" name="task_opt_<?php echo $i; ?>" id="task_opt_<?php echo $i; ?>" value="<?php echo $task['opt']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_opt(this)" required></td>
                                    <td><input type="number" name="task_ml_<?php echo $i; ?>" id="task_ml_<?php echo $i; ?>" value="<?php echo $task['ml']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_ml(this)" required></td>
                                    <td><input type="number" name="task_pes_<?php echo $i; ?>" id="task_pes_<?php echo $i; ?>" value="<?php echo $task['pes']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_pes(this)" required></td>
                                    <td><?php
                                        if ($i == 1) {
                                        ?>
                                            <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="-" readonly>
                                            <?php
                                        } else {
                                            $x = $i - 1;
                                            if ($i <= 10) {
                                            ?>
                                                <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="<?php echo $task['prereq']; ?>" pattern="[1-<?php echo $x; ?>](;[1-<?php echo $x; ?>])*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
                                            <?php
                                            } else if ($i > 10) {
                                                $y = $i - 11;
                                            ?>
                                                <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="<?php echo $task['prereq']; ?>" pattern="([1-9]|1[0-<?php echo $y; ?>])(;([1-9]|1[0-<?php echo $y; ?>]))*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
                                        <?php }
                                        } ?>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="calculate">
            <button class="btn">Calculate</button>
        </div>
        </form>

        <section class="collapsible">
            <input type="checkbox" name="collapse" id="handle1" checked="checked">
            <h2 class="handle">
                <label for="handle1">How WAPS' Project Evaluation Review Technique (PERT) Works:</label>
            </h2>
            <div class="content">
                <div class="pert">
                    <p><strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                    <p><strong>Step 2:</strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times provided by the user for each activity that are required to complete the activities.</p>
                    <p><strong>Step 3:</strong> Calculates the duration (T) by getting the mean of the 3 durations.</p>
                    <img src="<?= base_url('assets/images/howitworks/pert_mean.png') ?>"></img>
                    <p><strong>Step 4:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                    <p><strong>Step 5:</strong> Performs a Forward Pass.</p>
                    <ol type="a">
                        <li>
                            <p>Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity.</p>
                        </li>
                        <li>
                            <p>For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0.</p>
                        </li>
                        <li>
                            <p>Then, calculates the EF by adding the duration of the activity to its ES.</p>
                        </li>
                        <center>
                            <p><i>EF = ES + T</i></p>
                        </center>
                        <li>
                            <p>This process continues until the ES and EF have been calculated for all activities.</p>
                        </li>
                        <li>
                            <p>Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0.</p>
                        </li>
                    </ol>
                    <p><strong>Step 6:</strong> Performs a Backward Pass.</p>
                    <ol type="a">
                        <li>
                            <p>Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity.</p>
                        </li>
                        <li>
                            <p>For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT).</p>
                        </li>
                        <li>
                            <p>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network.</p>
                        </li>
                        <center>
                            <p><i>LS = LF - T</i></p>
                        </center>
                        <li>
                            <p>Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path.</p>
                        </li>
                        <li>
                            <p>Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project.</p>
                        </li>
                    </ol>
                    <p><strong>Step 7:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                </div>
            </div>
        </section>
        <button id="myBtn"><i class="fa fa-question" aria-hidden="true"></i></button>
        <div id="myModal" class="mymodal">
            <!-- Modal content -->
            <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="modal-header">
                        <h3 class="mmodal-title"></h3>
                    </div>
                    <div class="modal-body">
                        <hr>
                        <div class="mustknow">
                            <h2>Must Know!</h2>
                            <div class="mustknow-desc">
                                <h5>Activity</h5>
                                <ul>
                                    <li>
                                        <p>The activity column is auto iterated from 1 by the system and cannot be changed.</p>
                                    </li>
                                </ul>
                                <h5>Description</h5>
                                <ul>
                                    <li>
                                        <p>Description of each activity with a maximum of 50 characters.</p>
                                    </li>
                                    <li>
                                        <p>This is an optional input.</p>
                                    </li>
                                </ul>
                                <h5>Optimistic</h5>
                                <ul>
                                    <li>
                                        <p>The minimum amount of time required to finish a task, assuming that the progress is faster than the typical expectations.</p>
                                    </li>
                                    <li>
                                        <p>Optimistic duration must be a positive integer.</p>
                                    </li>
                                    <li>
                                        <p>Decimals are accepted.</p>
                                    </li>
                                </ul>
                                <h5>Most Likely</h5>
                                <ul>
                                    <li>
                                        <p>The expected duration for completing a task, assuming that progress is in accordance with standard expectations.</p>
                                    </li>
                                    <li>
                                        <p>Most Likely duration must be a positive integer.</p>
                                    </li>
                                    <li>
                                        <p>Decimals are accepted.</p>
                                    </li>
                                </ul>
                                <h5>Pessimistic</h5>
                                <ul>
                                    <li>
                                        <p>The maximum amount of time required to complete a task, assuming everything that could possibly go wrong, actually goes wrong.</p>
                                    </li>
                                    <li>
                                        <p>Pessimistic duration must be a positive integer.</p>
                                    </li>
                                    <li>
                                        <p>Decimals are accepted.</p>
                                    </li>
                                </ul>
                                <h5>Pre-requisites</h5>
                                <ul>
                                    <li>
                                        <p>The activity/s that must be completed before the current activity starts. </p>
                                    </li>
                                    <li>
                                        <p>Pre-requisites of each activity must be existing activity numbers separated by commas without spaces.</p>
                                    </li>
                                    <li>
                                        <p>If there are no pre-requisites, enter '-'. The first activity's pre-requisite is automatically set to '-'.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="howto">
                            <h2>How To?</h2>
                            <ul>
                                <li>
                                    <p>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                                        pre-requisite/s.</p>
                                </li>
                                <li>
                                    <p>After completing the table, click 'Calculate' to schedule your project. A table will show the following
                                        information for your project: <i> Activity, Description, Three Durations, Mean, Standard Deviation, Variance, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i>.</p>
                                </li>
                                <li>
                                    <p>After generating the results of your input, you will have a choice to calculate completion probability
                                        based on your expected duration. There are 2 types: Project Completion Probability and Activity
                                        Completion Probability.</p>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <center>
                            <h6><a href="<?= base_url('howtouse/pert') ?>">Click here</a> to see more on how to use WAPS with Simulation.</h6>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function check_opt(opt) {
        var opt = opt;
        if (!opt.validity.valid) {
            opt.value = "";
        }
    }

    function check_ml(ml) {
        var ml = ml;
        var ml_id = ml.id;
        ml_id = ml_id.substr(8);
        if (!ml.validity.valid) {
            ml.value = "";
        } else {
            var optv = document.getElementById("task_opt_" + ml_id).value;
            var mlv = Number(ml.value);
            optv = Number(optv);
            if (mlv < optv) {
                alert('Most Likely should be equal to or greater than Optimistic.');
                ml.value = "";
            }
        }
    }

    function check_pes(pes) {
        var pes = pes;
        var pes_id = pes.id;
        pes_id = pes_id.substr(9);
        if (!pes.validity.valid) {
            pes.value = "";
        } else {
            var mlv = document.getElementById("task_ml_" + pes_id).value;
            var pesv = Number(pes.value);
            mlv = Number(mlv);
            if (pesv < mlv) {
                alert('Pessimistic should be equal to or greater than Most Likely and Optimistic.');
                pes.value = "";
            }
        }
    }

    function demo1() {
        console.log('demo 1');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "3";
        document.getElementById('task_ml_1').value = "5";
        document.getElementById('task_pes_1').value = "7";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "4";
        document.getElementById('task_ml_2').value = "6";
        document.getElementById('task_pes_2').value = "9";
        document.getElementById('task_prereq_2').value = "1";
        
        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "2";
        document.getElementById('task_ml_3').value = "3";
        document.getElementById('task_pes_3').value = "6";
        document.getElementById('task_prereq_3').value = "2";
        
        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "7";
        document.getElementById('task_ml_4').value = "10";
        document.getElementById('task_pes_4').value = "15";
        document.getElementById('task_prereq_4').value = "-";
        
        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_opt_5').value = "9";
        document.getElementById('task_ml_5').value = "12";
        document.getElementById('task_pes_5').value = "19";
        document.getElementById('task_prereq_5').value = "1";
        
        document.getElementById('task_desc_6').value = "F";
        document.getElementById('task_opt_6').value = "2";
        document.getElementById('task_ml_6').value = "6";
        document.getElementById('task_pes_6').value = "13";
        document.getElementById('task_prereq_6').value = "2";
        
        document.getElementById('task_desc_7').value = "G";
        document.getElementById('task_opt_7').value = "6";
        document.getElementById('task_ml_7').value = "9";
        document.getElementById('task_pes_7').value = "13";
        document.getElementById('task_prereq_7').value = "3";
        
        document.getElementById('task_desc_8').value = "H";
        document.getElementById('task_opt_8').value = "4";
        document.getElementById('task_ml_8').value = "7";
        document.getElementById('task_pes_8').value = "12";
        document.getElementById('task_prereq_8').value = "4";
        
        document.getElementById('task_desc_9').value = "I";
        document.getElementById('task_opt_9').value = "5";
        document.getElementById('task_ml_9').value = "9";
        document.getElementById('task_pes_9').value = "18";
        document.getElementById('task_prereq_9').value = "5";
        
        document.getElementById('task_desc_10').value = "J";
        document.getElementById('task_opt_10').value = "2";
        document.getElementById('task_ml_10').value = "5";
        document.getElementById('task_pes_10').value = "9";
        document.getElementById('task_prereq_10').value = "5";
        
        document.getElementById('task_desc_11').value = "K";
        document.getElementById('task_opt_11').value = "1";
        document.getElementById('task_ml_11').value = "3";
        document.getElementById('task_pes_11').value = "6";
        document.getElementById('task_prereq_11').value = "6";
        
        document.getElementById('task_desc_12').value = "L";
        document.getElementById('task_opt_12').value = "7";
        document.getElementById('task_ml_12').value = "9";
        document.getElementById('task_pes_12').value = "12";
        document.getElementById('task_prereq_12').value = "7";
        
        document.getElementById('task_desc_13').value = "M";
        document.getElementById('task_opt_13').value = "10";
        document.getElementById('task_ml_13').value = "15";
        document.getElementById('task_pes_13').value = "17";
        document.getElementById('task_prereq_13').value = "10";
        
        document.getElementById('task_desc_14').value = "N";
        document.getElementById('task_opt_14').value = "14";
        document.getElementById('task_ml_14').value = "19";
        document.getElementById('task_pes_14').value = "22";
        document.getElementById('task_prereq_14').value = "12";
        
        document.getElementById('task_desc_15').value = "O";
        document.getElementById('task_opt_15').value = "4";
        document.getElementById('task_ml_15').value = "9";
        document.getElementById('task_pes_15').value = "14";
        document.getElementById('task_prereq_15').value = "14";       
    }

    function demo2() {
        console.log('demo 2');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "2";
        document.getElementById('task_ml_1').value = "4";
        document.getElementById('task_pes_1').value = "5";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "1";
        document.getElementById('task_ml_2').value = "2";
        document.getElementById('task_pes_2').value = "4";
        document.getElementById('task_prereq_2').value = "1";
        
        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "1";
        document.getElementById('task_ml_3').value = "3";
        document.getElementById('task_pes_3').value = "4";
        document.getElementById('task_prereq_3').value = "1,2";
        
        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "1";
        document.getElementById('task_ml_4').value = "2";
        document.getElementById('task_pes_4').value = "4";
        document.getElementById('task_prereq_4').value = "1,2,3";
    }

    function demo3() {
        console.log('demo 3');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "1";
        document.getElementById('task_ml_1').value = "3";
        document.getElementById('task_pes_1').value = "5";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "1";
        document.getElementById('task_ml_2').value = "4";
        document.getElementById('task_pes_2').value = "5";
        document.getElementById('task_prereq_2').value = "-";
        
        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "1";
        document.getElementById('task_ml_3').value = "2";
        document.getElementById('task_pes_3').value = "5";
        document.getElementById('task_prereq_3').value = "2";
        
        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "3";
        document.getElementById('task_ml_4').value = "4";
        document.getElementById('task_pes_4').value = "5";
        document.getElementById('task_prereq_4').value = "1";
    }
</script>