<div class="outputpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Critical Path Method (CPM)</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>CPM calculates the earliest and latest start and finish times for each activity,
                        allowing project managers to determine which activities can be delayed without
                        affecting the project's overall duration.
                        <br>
                        This table shows the project time completion based on the data provided using the CPM Method:
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
                            <th title="Estimated Activity Duration">Duration <span class="tooltiptext">&#9432;</span></th>
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
                                <td><?php echo $task['time'] . " " . $task['unit']; ?></td>
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
                                <td><?php echo $task['isCritical']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CARDS -->
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
                    <h4>Project Finish Time</h4>
                    <p>
                        <?php echo number_format((float)$_SESSION['finish_time'], 2, '.', '')." ".$_SESSION['unit']; ?>
                    </p>
                </center>
            </div>
        </div>
        <div class="export">
            <!-- Export Results Excel File -->
            <form action="<?php echo base_url('export/result') ?>" method="post">
                <?php
                $len = count($project);
                foreach ($project as $task) {
                ?>
                    <input type="hidden" name="<?php echo $task['id']; ?>" value="<?php echo $task['id']; ?>">
                    <input type="hidden" name="desc_<?php echo $task['id']; ?>" value="<?php echo $task['desc']; ?>">
                    <input type="hidden" name="time_<?php echo $task['id']; ?>" value="<?php echo $task['time']; ?>">
                    <?php
                    $pre = implode(",", $task['prereq']);
                    if ($pre == '-1') {
                        $pre = '-';
                    }
                    ?>
                    <input type="hidden" name="pre_<?php echo $task['id']; ?>" value="<?php echo $pre; ?>">
                    <input type="hidden" name="es_<?php echo $task['id']; ?>" value="<?php echo $task['es']; ?>">
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
    </div>
</div>