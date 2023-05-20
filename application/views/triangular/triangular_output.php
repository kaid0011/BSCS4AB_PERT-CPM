<div class="outputpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Triangular Distribution</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>Triangular distribution can be defined as a continuous probability distribution with a probability density function shaped like a triangle. It is incorporated by three values namely: a minimum value, a most likely value, and a maximum value. It has been the best method for probability distribution in order to quantify the risks in projects.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid-container">
            <div class="tablecontainer">
                <table class="results">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th title="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                            <th title="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                            <th title="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                            <th title="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                            <th title="Calculated Activity Completion based on OT, MLT, and PT">Calculated Duration <span class="tooltiptext">&#9432;</span></th>
                            <th title="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
                            <th title="Activity's Earliest Start Time">ES <span class="tooltiptext">&#9432;</span></th>
                            <th title="Activity's Earliest Finish Time">EF <span class="tooltiptext">&#9432;</span></th>
                            <th title="Activity's Latest Start Time">LS <span class="tooltiptext">&#9432;</span></th>
                            <th title="Activity's Latest Finish Time">LF <span class="tooltiptext">&#9432;</span></th>
                            <th title="Activity's Available Slack Time">Slack <span class="tooltiptext">&#9432;</span></th>
                            <th title="If the Activity is Critical">Critical <span class="tooltiptext">&#9432;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $project = $_SESSION['project'];
                        foreach ($project as $task) {
                        ?>
                            <tr>
                                <td><?php echo $task['id']; ?></td>
                                <td><?php echo $task['desc']; ?></td>
                                <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                                <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                                <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                                <td><?php echo number_format((float)$task['time'], 2, '.', '') . " " . $task['unit']; ?></td>
                                <td><?php
                                    $pre = implode(",", $task['prereq']);
                                    if ($pre == '-1') {
                                        $pre = '-';
                                    }
                                    echo $pre;
                                    ?></td>
                                <td><?php echo number_format((float)$task['es'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['ef'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['ls'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['lf'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['slack'], 2, '.', ''); ?></td>
                                <td><?php echo $task['isCritical'] == 1 ? "Yes" : "No"; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Final Results Display -->
        <div class="container">
            <div class="box">
                <center>
                    <h4>Critical Path</h4>
                    <p>
                        <?php
                        $cp = $_SESSION['cp'];
                        $max = max(array_column($cp, 'id'));
                        foreach ($cp as $cp) {
                            if ($cp['id'] == $max) {
                                echo $cp['id'];
                            } else {
                                echo $cp['id'] . " → ";
                            }
                        }
                        ?>
                    </p>
                </center>
            </div>

            <div class="box">
                <center>
                    <h4>Project Completion Time</h4>
                    <p>
                        <?php echo number_format((float)$_SESSION['finish_time'], 2, '.', '')." ".$_SESSION['unit']; ?>
                    </p>
                </center>
            </div>
        </div>

        <div class="export">
            <!-- Export Results Excel File -->
            <form action="<?php echo base_url('export/results') ?>" method="post">
                <?php
                $len = count($project);
                foreach ($project as $task) {
                ?>
                    <input type="hidden" name="<?php echo $task['id']; ?>" value="<?php echo $task['id']; ?>">
                    <input type="hidden" name="desc_<?php echo $task['id']; ?>" value="<?php echo $task['desc']; ?>">
                    <input type="hidden" name="opt_<?php echo $task['id']; ?>" value="<?php echo $task['opt']; ?>">
                    <input type="hidden" name="ml_<?php echo $task['id']; ?>" value="<?php echo $task['ml']; ?>">
                    <input type="hidden" name="pes_<?php echo $task['id']; ?>" value="<?php echo $task['pes']; ?>">
                    <input type="hidden" name="time_<?php echo $task['id']; ?>" value="<?php echo $task['time']; ?>">
                    <?php
                    $pre = implode(",", $task['prereq']);
                    if ($pre == '-1') {
                        $pre = '-';
                    }
                    ?>
                    <input type="hidden" name="pre_<?php echo $task['id']; ?>" value="<?php echo $pre; ?>">
                    <input type="hidden" name="es_<?php echo $task['id']; ?>" value="<?php echo $task['es'];; ?>">
                    <input type="hidden" name="ef_<?php echo $task['id']; ?>" value="<?php echo $task['ef']; ?>">
                    <input type="hidden" name="ls_<?php echo $task['id']; ?>" value="<?php echo $task['ls']; ?>">
                    <input type="hidden" name="lf_<?php echo $task['id']; ?>" value="<?php echo $task['lf']; ?>">
                    <input type="hidden" name="slack_<?php echo $task['id']; ?>" value="<?php echo $task['slack']; ?>">
                    <input type="hidden" name="ic_<?php echo $task['id']; ?>" value="<?php echo $task['isCritical']; ?>">
                <?php } ?>
                <input type="hidden" name="len" value="<?php echo $len; ?>">
                <center><button class="expbtn">Export Results</button></center>
            </form>
        </div>

        <div class="export">
            <!-- Export Simulation Values Excel File -->
            <form action="<?php echo base_url('export/simu') ?>" method="post">
                <?php
                foreach ($project as $sim) {
                    $id = $sim['id'];
                    $n = $sim['N'];
                ?>
                    <input type="hidden" name="<?php echo $id; ?>" value="<?php echo $id; ?>">
                    <input type="hidden" name="N_<?php echo $id; ?>" value="<?php echo $n; ?>">
                    <input type="hidden" name="pqty_<?php echo $id; ?>" value="<?php echo $sim['pqty']; ?>">
                    <?php
                    $sv = implode(",", $sim['sim_val']);
                    ?>
                    <input type="hidden" name="sv_<?php echo $id; ?>" value="<?php echo $sv; ?>">
                <?php } ?>
                <!-- <input type="submit" value="Export" name="export"> -->
                <center><button class="expbtn">Export Simulation Values</button></center>
            </form>
        </div>

         <!-- Gantt Chart -->
         <div class="grid-container-gantt">
            <div class="title">
                <h2>Gantt Chart</h2>
            </div>
            <div class="gridd-container">
                <div class="gantt">
                    <table class="gantt-chart">
                        <thead>
                            <tr class="gantt-act">
                                <th class="first"></th>
                                <?php
                                for ($col = 1; $col <= $_SESSION['finish_time'] + 1; $col++) {
                                    if ($col == ceil($_SESSION['finish_time']) + 1) { ?>
                                        <th class="other"></th>
                                    <?php } else { ?>
                                        <th class="other" style="text-align: right;"><?php echo "$col"; ?></th>
                                <?php }
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($project as $task) { ?>
                                <tr>
                                    <td><strong><?php echo "Activity " . $task['id']; ?></strong></td>
                                    <td colspan="<?php echo ceil($_SESSION['finish_time']); ?>">
                                        <?php
                                        $waiting = ($task['es'] / $_SESSION['finish_time']) * 100;
                                        $progress = (($task['lf'] - $task['es']) / $_SESSION['finish_time']) * 100;
                                        $total_time = $_SESSION['finish_time'] / ceil($_SESSION['finish_time']) * 100;
                                        ?>
                                        <div style="background-color:#B19090; width: <?php echo $total_time; ?>%">
                                            <div class="waiting" style="position: relative; float: left; display: inline-block; width: <?php echo $waiting ?>%"></div>
                                            <div class="progress" style="position: relative; float: left; display: inline-block; width: <?php echo $progress ?>%"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- PERT Chart -->
        <?php $this->view('trial'); ?> 

        <section class="collapsible">
            <input type="checkbox" name="collapse" id="handle1" checked="checked">
            <h2 class="handle">
                <label for="handle1">How WAPS' Triangular Distribution Works:</label>
            </h2>
            <div class="content">
                <div class="triangular">
                    <p><strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                    <p><strong>Step 2:</strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times
                        provided by the user for each activity that are required to complete the activities.</p>
                    <p><strong>Step 3:</strong> Assigns a random value to a variable r using the random()function that randomly selects a value which was set from 0.0 to 1.0. This value undergoes the Monte Carlo Simulation to achieve a more accurate result. The number of trials is based on the user's input.</p>
                    <center>
                        <p><i>r = random()</i></p>
                    </center>
                    <p><strong>Step 4:</strong> Determines what formula should be used based on a conditional statement:</p>
                    <div class="where1">
                        <p>If r < (m-a) / (b-a), <i>assign the following to their own variables:</i></p>
                        <div class="func-desc">
                            <p>x = 1;</p>
                            <p>y = -2a;</p>
                            <p>z = a<sup>2</sup> - r (m - a) (b - a);</p>
                            <p>Then, compute the duration (T) using the formula:</p>
                        </div>
                        <img src="<?= base_url('assets/images/tria_1.png') ?>">
                        <p>Else:</p>
                        <div class="func-desc">
                            <p>x = 1;</p>
                            <p>y = -2b;</p>
                            <p>z = b<sup>2</sup> - (1 - r) (b - a) (b - m);</p>
                            <p>Then, compute the duration (T) using the formula:</p>
                        </div>
                        <img src="<?= base_url('assets/images/tria_2.png') ?>">
                    </div>
                    <p><strong>Step 5:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                    <p><strong>Step 6:</strong> Performs a Forward Pass.</p>
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
                    <p><strong>Step 7:</strong> Performs a Backward Pass.</p>
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
                    <p><strong>Step 8:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                </div>
            </div>
        </section>
    </div>
</div>