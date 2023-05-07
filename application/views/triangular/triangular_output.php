<div class="firstpg">
    <div class="title">
        <b> Triangular Distribution</b>
    </div>
    <div class="paragone">
        Triangular distribution can be defined as a continuous probability distribution with a probability density function shaped like a triangle. It is incorporated by three values namely: a minimum value, a most likely value, and a maximum value. It has been the best method for probability distribution in order to quantify the risks in projects.
    </div>
</div>
<div class="grid-container">
    <div class="grid-item">
        <table class="results">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th title="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                    <th title="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                    <th title="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                    <th title="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                    <th title="Estimated Activity Completion based on OT, MLT, and PT">Estimated Duration <span class="tooltiptext">&#9432;</span></th>
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
                foreach ($project as $task) {
                ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['desc']; ?></td>
                        <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['time'] . " " . $task['unit']; ?></td>
                        <td><?php
                            $pre = implode(",", $task['prereq']);
                            if ($pre == '-1') {
                                $pre = '-';
                            }
                            echo $pre;
                            ?></td>
                        <td><?php echo $task['es']; ?></td>
                        <td><?php echo $task['ef']; ?></td>
                        <td><?php echo $task['ls']; ?></td>
                        <td><?php echo $task['lf']; ?></td>
                        <td><?php echo $task['slack']; ?></td>
                        <td><?php echo $task['isCritical']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="grid-item"> -->

</div>

<!-- Final Results Display -->
<div class="container-final">
    <div class="resultsbox">
        <center>
            <h3>Critical Path</h3>
            <p>
                <?php
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

    <div class="resultsbox">
        <center>
            <h3>Project Completion Time</h3>
            <p>
                <?php echo $finish_time; ?>
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
    <form action="<?php echo base_url('export') ?>" method="post">
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

<section class="collapsible">
    <input type="checkbox" name="collapse" id="handle1" checked="checked">
    <h2 class="handle">
        <label for="handle1">How Triangular Distribution Works: (Step by Step)</label>
    </h2>
    <div class="content">
        <p>
            <strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs <br><br>
            <strong>Step 2:</strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times
            provided by the user for each activity that are required to complete the activities.<br><br>
            <strong>Step 3:</strong> Assigns a random value to a variable r using the random()function that randomly selects a value which was set from 0.0 to 1.0. This value undergoes the Monte Carlo Simulation to achieve a more accurate result. The number of trials is based on the user's input. <center>r = random()</center>
            <br><br>
            <strong>Step 4:</strong> Determines what formula should be used based on a conditional statement:
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;If r < (m-a) / (b-a), <i>assign the following to their own variables</i><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; x = 1; <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; y = -2a;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; z = a<sup>2</sup> - r(m-a)(b-a);<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Then, compute the duration (T) using the formula:<br>
                <center><img align="center" src="//i.upmath.me/svg/%24%24T%3D%20%7B%7B-y%2B%5Csqrty%5E2-4xz%5Cover%202%7D%5Cover%20x%7D"> </center> <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Else:<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; x = 1; <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; y = -2b;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; z = b<sup>2</sup> - (1 - r) (b - a) (b - m);<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Then, compute the duration (T) using the formula:
                <strong>Step 5:</strong> Calculates the mean (𝜇) of the 3 durations for each activity.
                <br><br>
                <center><img align="center" src="//i.upmath.me/svg/%5Cmu%3D%20%7Ba%2B4m%2Bb%5Cover%206%7D"> </center> <br>
                <strong>Step 5:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts. <br><br>
                <strong>Step 6:</strong> Performs a Forward Pass. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b> Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity. <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0. <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the EF by adding the duration of the activity to its ES. <br>
                <center><i>EF = ES + T</i></center><BR>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> This process continues until the ES and EF have been calculated for all activities. <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0. <br><br>
                <strong>Step 7:</strong> Performs a Backward Pass. <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b> Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT) <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network. <br> <br>
                <center><i>LS = LF - T</i></center><BR>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path. <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project. <br><br>
                <strong>Step 8:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path. <br><br>
        </p>
    </div>
</section>
<!-- GANTT CHART -->
<<!-- CHART -->
    <div class="ganttchartname">
        <b> Project Gantt Chart</b>
    </div>
    <div class="ganttcontainer" style="max-width: 100%; margin: 0 auto; padding: 50px;">
        <div class="chart" style="display: grid; position: relative; overflow: hidden; overflow-x:auto">
            <table class="gantt-chart">
                <tr>
                    <th style="border-bottom-style: ridge; border-right-style: ridge;"></th>
                    <?php
                    for ($col = 1; $col <= $finish_time + 1; $col++) {
                        if ($col == ceil($finish_time)) { ?>
                            <th style="border-bottom-style: ridge;"></th>
                        <?php } else { ?>
                            <th style="border-bottom-style: ridge; text-align: right;"><?php echo "$col"; ?></th>
                    <?php }
                    } ?>
                </tr>
                <?php
                foreach ($project as $task) { ?>
                    <tr>
                        <th style="border-bottom-style: ridge; border-right-style: ridge;"><?php echo "Activity " . $task['id']; ?></th>
                        <th style="border-bottom-style: ridge;" colspan="<?php echo ceil($finish_time); ?>">
                            <?php
                            $waiting = ($task['es'] / $finish_time) * 100;
                            $progress = (($task['lf'] - $task['es']) / $finish_time) * 100;
                            $total_time = $finish_time / ceil($finish_time) * 100;
                            ?>
                            <div style="background-color:#B19090; width: <?php echo $total_time; ?>%">
                                <div class="waiting" style="position: relative; float: left; display: inline-block; width: <?php echo $waiting ?>%"></div>
                                <div class="progress" style="position: relative; float: left; display: inline-block; width: <?php echo $progress ?>%"></div>
                            </div>
                        </th>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <br> <br>