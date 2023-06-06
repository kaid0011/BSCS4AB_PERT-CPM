<div class="inputpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Critical Path Method (CPM)</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>
                        CPM calculates the earliest and latest start and finish times for each activity,
                        allowing project managers to determine which activities can be delayed without
                        affecting the project's overall duration.</p>
                </div>
            </div>
        </div>
        <!-- FOR DEMO PURPOSES -->
        <input type="hidden" name="d" id="d" value="<?php echo $_SESSION['d']; ?>">
        <div class="grid-container">
            <div class="tablecontainer" style="overflow-x:auto;">
                <table class="results">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th title="Activity Name">Name </th>
                            <th title="Activity Description">Description </th>
                            <th title="Estimated Activity Duration">Duration </th>
                            <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
                            <input type="number" name="proj_len" value="<?php echo $_SESSION['proj_len']; ?>" hidden>
                            <input type="text" name="choice" value="<?php echo 'cpm'; ?>" hidden>
                            <input type="text" name="unit" value="<?php echo $_SESSION['unit']; ?>" hidden>
                            <input type="text" name="ProjectID" value="<?php echo $_SESSION['ProjectID']; ?>" hidden>
                            <?php
                            for ($i = 1; $i <= $_SESSION['proj_len']; $i++) {
                            ?>
                                <tr>
                                    <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                                    <td><input type="text" name="task_name_<?php echo $i; ?>" id="task_name_<?php echo $i; ?>"></td>
                                    <td><input type="text" name="task_desc_<?php echo $i; ?>" id="task_desc_<?php echo $i; ?>"></td>
                                    <td><input type="number" name="task_time_<?php echo $i; ?>" id="task_time_<?php echo $i; ?>" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                    <td><?php
                                        if ($i == 1) {
                                        ?>
                                            <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="-" readonly>
                                            <?php
                                        } else {
                                            $x = $i - 1;
                                            if ($i <= 10) {
                                            ?>
                                                <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" pattern="[1-<?php echo $x; ?>](;[1-<?php echo $x; ?>])*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
                                            <?php
                                            } else if ($i > 10) {
                                                $y = $i - 11;
                                            ?>
                                                <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" pattern="([1-9]|1[0-<?php echo $y; ?>])(;([1-9]|1[0-<?php echo $y; ?>]))*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
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
                <label for="handle1">How WAPS' Critical Path Method (CPM) Works:</label>
            </h2>
            <div class="content">
                <div class="cpm">
                    <p><strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                    <p><strong>Step 2:</strong> Determines the duration (T), which is the time required to complete each activity.</p>
                    <p><strong>Step 3:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                    <p><strong>Step 4:</strong> Performs a Forward Pass.</p>
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
                    <p><strong>Step 5:</strong> Performs a Backward Pass.</p>
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
                    <p><strong>Step 6:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                    </ol>
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
                                <h5>Estimated Duration</h5>
                                <ul>
                                    <li>
                                        <p>The length of time required to complete each activity.</p>
                                    </li>
                                    <li>
                                        <p>Duration must be a positive integer. Decimals are accepted.</p>
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
                                    <p>For each activity, enter the description, estimated duration, and its
                                        pre-requisite/s.</p>
                                </li>
                                <li>
                                    <p>After completing the table, click 'Calculate' to schedule your project. A table will show the following
                                        information for your project: <i> Activity, Description, Estimated Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i></p>
                                </li>
                            </ul>
                        </div>
                            <hr>
                            <center>
                                <h6><a href="<?= base_url('howtouse/cpm') ?>">Click here</a> to see more how to use WAPS with Simulation.</h6>
                            </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var d = $("#d").val();
        if(d == 'demo1') {
            demo1();
        }
        else if(d == 'demo2') {
            demo2();
        }
        else if(d == 'demo3') {
            demo3();
        }
    });

    function demo1() {
        console.log('demo 1');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_time_1').value = "3";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_time_2').value = "4";
        document.getElementById('task_prereq_2').value = "-";
        
        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_time_3').value = "5";
        document.getElementById('task_prereq_3').value = "1";
        
        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_time_4').value = "6";
        document.getElementById('task_prereq_4').value = "2";
        
        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_time_5').value = "7";
        document.getElementById('task_prereq_5').value = "3";
        
        document.getElementById('task_desc_6').value = "F";
        document.getElementById('task_time_6').value = "8";
        document.getElementById('task_prereq_6').value = "4,5";
        
        document.getElementById('task_desc_7').value = "G";
        document.getElementById('task_time_7').value = "9";
        document.getElementById('task_prereq_7').value = "6";
        
        document.getElementById('task_desc_8').value = "H";
        document.getElementById('task_time_8').value = "10";
        document.getElementById('task_prereq_8').value = "7";
        
        document.getElementById('task_desc_9').value = "I";
        document.getElementById('task_time_9').value = "11";
        document.getElementById('task_prereq_9').value = "8";
        
        document.getElementById('task_desc_10').value = "J";
        document.getElementById('task_time_10').value = "12";
        document.getElementById('task_prereq_10').value = "9";
        
        document.getElementById('task_desc_11').value = "K";
        document.getElementById('task_time_11').value = "13";
        document.getElementById('task_prereq_11').value = "-";
        
        document.getElementById('task_desc_12').value = "L";
        document.getElementById('task_time_12').value = "10";
        document.getElementById('task_prereq_12').value = "1";
        
        document.getElementById('task_desc_13').value = "M";
        document.getElementById('task_time_13').value = "9";
        document.getElementById('task_prereq_13').value = "3";
        
        document.getElementById('task_desc_14').value = "N";
        document.getElementById('task_time_14').value = "4";
        document.getElementById('task_prereq_14').value = "-";
        
        document.getElementById('task_desc_15').value = "O";
        document.getElementById('task_time_15').value = "7";
        document.getElementById('task_prereq_15').value = "-";       
    }

    function demo2() {
        console.log('demo 2');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_time_1').value = "19";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_time_2').value = "17";
        document.getElementById('task_prereq_2').value = "1";
        
        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_time_3').value = "11";
        document.getElementById('task_prereq_3').value = "1";
        
        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_time_4').value = "20";
        document.getElementById('task_prereq_4').value = "2";
        
        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_time_5').value = "13";
        document.getElementById('task_prereq_5').value = "3";
    }

    function demo3() {
        console.log('demo 3');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_time_1').value = "13";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_time_2').value = "14";
        document.getElementById('task_prereq_2').value = "1";
        
        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_time_3').value = "15";
        document.getElementById('task_prereq_3').value = "1,2";
    }
</script>