<div class="inputpg">
    <div class="left-button">
        <button onclick="back()"><i class="fa fa-arrow-left"></i></button>
    </div>
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>BETA-PERT Distribution</h1>
            </div>
            <!-- <div class="paragone">
                <div class="description">
                    <p>The BETA-PERT distribution is a type of probability distribution that is used in PERT analysis. It combines aspects of both the normal and triangular distributions to model uncertainty in task durations. The BETA-PERT distribution is characterized by three parameters: the minimum,most likely, and maximum duration for a task. It is often used in schedulercalculators to perform simulations that take into account the uncertainty andvariability of task durations.</p>
                </div>
            </div> -->
            <div class="dashboard">
                <div class="progress-circle">
                    <div class="steps">
                        <span class="circle active">1</span>
                        <span class="circle active">2</span>
                        <span class="circle">3</span>
                        <div class="progress-bar">
                            <span class="indicator2"></span>
                        </div>
                    </div>
                </div>
                <div class="progress-label">
                    <div class="steps">
                        <span class="">Project<br>Details</span>
                        <span class="">Input<br>Taks</span>
                        <span class="">Results</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-container">
            <div class="tablecontainer" style="overflow-x:auto">
                <table class="results">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th title="Activity Name">Name </th>
                            <th title="Activity Description">Description</th>
                            <th title="Shortest Estimated Activity Duration">Optimistic</th>
                            <th title="Reasonable Estimated Activity Duration">Most Likely</th>
                            <th title="Maximum Estimated Activity Duration">Pessimistic</th>
                            <th title="Activity Number that needs to be completed first.">Pre-Requisites</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="<?php echo base_url('betapert/calculate') ?>" method="post">
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
                                    <td><input type="number" name="task_opt_<?php echo $i; ?>" id="task_opt_<?php echo $i; ?>" value="<?php echo $task['opt']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_opt(this)" required style="margin-right: 2px;"><span><?php echo $_SESSION['unit'] ?></span></td>
                                    <td><input type="number" name="task_ml_<?php echo $i; ?>" id="task_ml_<?php echo $i; ?>" value="<?php echo $task['ml']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_ml(this)" required style="margin-right: 2px;"><span><?php echo $_SESSION['unit'] ?></span></td>
                                    <td><input type="number" name="task_pes_<?php echo $i; ?>" id="task_pes_<?php echo $i; ?>" value="<?php echo $task['pes']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_pes(this)" required style="margin-right: 2px;"><span><?php echo $_SESSION['unit'] ?></span></td>
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
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="trials">
            <strong>Number of Trials:</strong>
            <center>
                <input class="numoftrials" type="numbers" name="N" min="1" max="1000" oninput='validity.valid||(value="")' placeholder="Max. 1000" required>
            </center>
        </div>
        <br>
        <div class="calculate">
            <button class="btn">Calculate</button>
        </div>
        </form>
        <section class="collapsible"><input type="checkbox" name="collapse" id="handle1" checked="checked">
            <h2 class="handle"><label for="handle1">How BETA-PERT Distribution Works: (Step by Step)</label></h2>
            <div class="content">
                <div class="betapert">
                    <p><strong>Step 1:</strong>Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                    <p><strong>Step 2:</strong>Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times provided by the user for each activity that are required to complete the activities.</p>
                    <p><strong>Step 3:</strong>Calculates the alpha value (𝛼) of the 3 durations for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/beta_alpha.png') ?>">
                    <p><strong>Step 4:</strong>Calculates the beta value (𝛽) of the 3 durations for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/beta_beta.png') ?>">
                    <p><strong>Step 5:</strong>Calculates the mean (𝜇) of the 3 durations for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/beta_mean.png') ?>">
                    <p><strong>Step 6:</strong>Calculates the standard deviation (𝜎) using the variance for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/beta_sd.png') ?>">
                    <p><strong>Step 7:</strong>Computes the duration (T) by using the beta.ppf function from scipy.stats to get the percentile rank (or the inverse of the cumulative distribution function) for a given beta distribution.</p>
                    <div class="func">
                        <div class="title">
                            <p><i>beta.ppf(q, a, b, loc=0, scale=1)</i></p>
                        </div>
                        <div class="where">
                            <p>Where:</p>
                            <div class="func-desc">
                                <h6>𝑞 = random()</h6>
                                <ul>
                                    <li>
                                        <p>This is a function randomly selects a value which was set from 0.0 to 1.0. It serves as the cumulative probability at which to evaluate the percent point function.</p>
                                    </li>
                                    <li>
                                        <p>This value undergoes the Monte Carlo Simulation to achieve a more accurate result. The number of trials is based on the user's input.</p>
                                    </li>
                                </ul>
                                <h6>a = 𝑎</h6>
                                <ul>
                                    <li>
                                        <p>The calculated alpha value (𝛼) of the 3 durations for each activity.</p>
                                    </li>
                                </ul>
                                <h6>𝑏 = 𝛽</h6>
                                <ul>
                                    <li>
                                        <p>The calculated beta value (𝛽) of the 3 durations for each activity.</p>
                                    </li>
                                </ul>
                                <h6>𝑙𝑜𝑐 = 𝜇</h6>
                                <ul>
                                    <li>
                                        <p>The calculated mean (𝜇) of the 3 durations for each activity.</p>
                                    </li>
                                </ul>
                                <h6>𝑠𝑐𝑎𝑙𝑒 = 𝜎</h6>
                                <ul>
                                    <li>
                                        <p>The calculated standard deviation (𝜎) of the 3 durations for each activity.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p><strong>Step 8:</strong>Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                    <p><strong>Step 9:</strong>Performs a Forward Pass.</p>
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
                    <p><strong>Step 9:</strong>Performs a Backward Pass.</p>
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
                    <p><strong>Step 10:</strong>Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                    </p>
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
                                        <p>The activity/s that must be completed before the current activity starts.</p>
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
                                    <p>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its pre-requisite/s.</p>
                                </li>
                                <li>
                                    <p>After completing the table, click 'Calculate' to schedule your project. A table will show the following information for your project:<i>Activity, Description, Three Durations, Mean, Standard Deviation, Variance, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i>.</p>
                                </li>
                                <li>
                                    <p>Enter the Number of Trials you desire for the simulation to perform.</p>
                                </li>
                                <li>
                                    <p>After generating the results of your input, you will have a choice to calculate completion probability based on your expected duration. There are 2 types: Project Completion Probability and Activity Completion Probability.</p>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <center>
                            <h6><a href="<?= base_url('howtouse/betapert') ?>">Click here</a> to see more how to use WAPS with Simulation.</h6>
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
                alert('Pessimistic should be equal to or greater than Most Likely.');
                pes.value = "";
            }
            var optv = document.getElementById("task_opt_" + pes_id).value;
            optv = Number(optv);
            if (optv == pesv) {
                alert('Pessimistic should not be equal to Optimistic.');
                pes.value = "";
            }
        }
    }

    function demo1() {
        console.log('demo 1');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "55.82";
        document.getElementById('task_ml_1').value = "60.07";
        document.getElementById('task_pes_1').value = "71.09";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "29.72";
        document.getElementById('task_ml_2').value = "58.21";
        document.getElementById('task_pes_2').value = "60.82";
        document.getElementById('task_prereq_2').value = "1";

        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "25.88";
        document.getElementById('task_ml_3').value = "35.61";
        document.getElementById('task_pes_3').value = "65.06";
        document.getElementById('task_prereq_3').value = "1";

        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "37.33";
        document.getElementById('task_ml_4').value = "54.59";
        document.getElementById('task_pes_4').value = "81.48";
        document.getElementById('task_prereq_4').value = "2";

        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_opt_5').value = "30.77";
        document.getElementById('task_ml_5').value = "36.76";
        document.getElementById('task_pes_5').value = "92.73";
        document.getElementById('task_prereq_5').value = "3";
    }

    function demo2() {
        console.log('demo 2');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "28.43";
        document.getElementById('task_ml_1').value = "30.06";
        document.getElementById('task_pes_1').value = "41.51";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "25.63";
        document.getElementById('task_ml_2').value = "40.47";
        document.getElementById('task_pes_2').value = "82.16";
        document.getElementById('task_prereq_2').value = "1";

        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "29.18";
        document.getElementById('task_ml_3').value = "35.72";
        document.getElementById('task_pes_3').value = "41.59";
        document.getElementById('task_prereq_3').value = "1";

        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "41.98";
        document.getElementById('task_ml_4').value = "59.25";
        document.getElementById('task_pes_4').value = "62.78";
        document.getElementById('task_prereq_4').value = "2";

        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_opt_5').value = "18.67";
        document.getElementById('task_ml_5').value = "27.72";
        document.getElementById('task_pes_5').value = "63.55";
        document.getElementById('task_prereq_5').value = "3";

        document.getElementById('task_desc_6').value = "F";
        document.getElementById('task_opt_6').value = "20.48";
        document.getElementById('task_ml_6').value = "34.06";
        document.getElementById('task_pes_6').value = "64.53";
        document.getElementById('task_prereq_6').value = "4";

        document.getElementById('task_desc_7').value = "G";
        document.getElementById('task_opt_7').value = "30.14";
        document.getElementById('task_ml_7').value = "45.05";
        document.getElementById('task_pes_7').value = "70.94";
        document.getElementById('task_prereq_7').value = "4";

        document.getElementById('task_desc_8').value = "H";
        document.getElementById('task_opt_8').value = "48.64";
        document.getElementById('task_ml_8').value = "69.60";
        document.getElementById('task_pes_8').value = "81.50";
        document.getElementById('task_prereq_8').value = "5";

        document.getElementById('task_desc_9').value = "I";
        document.getElementById('task_opt_9').value = "44.31";
        document.getElementById('task_ml_9').value = "48.14";
        document.getElementById('task_pes_9').value = "74.07";
        document.getElementById('task_prereq_9').value = "2,3";

        document.getElementById('task_desc_10').value = "J";
        document.getElementById('task_opt_10').value = "20.78";
        document.getElementById('task_ml_10').value = "22.23";
        document.getElementById('task_pes_10').value = "38.20";
        document.getElementById('task_prereq_10').value = "6,8";
    }

    function demo3() {
        console.log('demo 3');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "30.68";
        document.getElementById('task_ml_1').value = "58.46";
        document.getElementById('task_pes_1').value = "86.26";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "56.84";
        document.getElementById('task_ml_2').value = "74.31";
        document.getElementById('task_pes_2').value = "78.77";
        document.getElementById('task_prereq_2').value = "-";

        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "25.90";
        document.getElementById('task_ml_3').value = "32.56";
        document.getElementById('task_pes_3').value = "46.95";
        document.getElementById('task_prereq_3').value = "2";

        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "18.53";
        document.getElementById('task_ml_4').value = "19.27";
        document.getElementById('task_pes_4').value = "22.67";
        document.getElementById('task_prereq_4').value = "1";

        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_opt_5').value = "29.21";
        document.getElementById('task_ml_5').value = "29.82";
        document.getElementById('task_pes_5').value = "36.56";
        document.getElementById('task_prereq_5').value = "3";

        document.getElementById('task_desc_6').value = "F";
        document.getElementById('task_opt_6').value = "30.29";
        document.getElementById('task_ml_6').value = "34.60";
        document.getElementById('task_pes_6').value = "35.60";
        document.getElementById('task_prereq_6').value = "3";

        document.getElementById('task_desc_7').value = "G";
        document.getElementById('task_opt_7').value = "9.20";
        document.getElementById('task_ml_7').value = "13.57";
        document.getElementById('task_pes_7').value = "18.17";
        document.getElementById('task_prereq_7').value = "2";

        document.getElementById('task_desc_8').value = "H";
        document.getElementById('task_opt_8').value = "13.36";
        document.getElementById('task_ml_8').value = "14.86";
        document.getElementById('task_pes_8').value = "21.95";
        document.getElementById('task_prereq_8').value = "6";

        document.getElementById('task_desc_9').value = "I";
        document.getElementById('task_opt_9').value = "19.92";
        document.getElementById('task_ml_9').value = "29.84";
        document.getElementById('task_pes_9').value = "35.15";
        document.getElementById('task_prereq_9').value = "5";

        document.getElementById('task_desc_10').value = "J";
        document.getElementById('task_opt_10').value = "14.33";
        document.getElementById('task_ml_10').value = "21.91";
        document.getElementById('task_pes_10').value = "38.91";
        document.getElementById('task_prereq_10').value = "8";

        document.getElementById('task_desc_11').value = "K";
        document.getElementById('task_opt_11').value = "6.54";
        document.getElementById('task_ml_11').value = "16.01";
        document.getElementById('task_pes_11').value = "24.08";
        document.getElementById('task_prereq_11').value = "7";

        document.getElementById('task_desc_12').value = "L";
        document.getElementById('task_opt_12').value = "27.40";
        document.getElementById('task_ml_12').value = "49.60";
        document.getElementById('task_pes_12').value = "57.45";
        document.getElementById('task_prereq_12').value = "6";

        document.getElementById('task_desc_13').value = "M";
        document.getElementById('task_opt_13').value = "46.07";
        document.getElementById('task_ml_13').value = "58.23";
        document.getElementById('task_pes_13').value = "61.61";
        document.getElementById('task_prereq_13').value = "12";

        document.getElementById('task_desc_14').value = "N";
        document.getElementById('task_opt_14').value = "36.13";
        document.getElementById('task_ml_14').value = "37.82";
        document.getElementById('task_pes_14').value = "41.99";
        document.getElementById('task_prereq_14').value = "11";

        document.getElementById('task_desc_15').value = "O";
        document.getElementById('task_opt_15').value = "12.15";
        document.getElementById('task_ml_15').value = "20.05";
        document.getElementById('task_pes_15').value = "23.54";
        document.getElementById('task_prereq_15').value = "10";
    }
</script>