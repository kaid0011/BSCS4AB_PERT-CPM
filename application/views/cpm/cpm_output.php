<!-- Body  -->
<div class="firstpg">
    <div class="title">
        <b> Critical Path Method (CPM) </b>
    </div>
    <div class="paragone">
        CPM calculates the earliest and latest start and finish times for each activity,
        allowing project managers to determine which activities can be delayed without
        affecting the project's overall duration.
        <br><br>
            This table shows the project time completion based on the data provided using the CPM Method:
    </div>
</div>
<div class="grid-container">
    <div class="container">
        <table class="results">
            <thead>
                <tr>
                <th>Activity</th>
                    <th title ="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Estimated Activity Duration">Duration <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity's Earliest Start Time">ES <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity's Earliest Finish Time">EF <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity's Latest Start Time">LS <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity's Latest Finish Time">LF <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity's Available Slack Time">Slack <span class="tooltiptext">&#9432;</span></th>
                    <th title ="If the Activity is Critical">Critical <span class="tooltiptext">&#9432;</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
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
</div>

<!-- CARDS -->
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
           <h3>Project Finish Time</h3>
            <p>
                <?php echo $finish_time; ?>
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
<section class="collapsible">
    <input type="checkbox" name="collapse" id="handle1" checked="checked">
    <h2 class="handle">
        <label for="handle1">How BETA-PERT Distribution Works: (Step by Step)</label>
    </h2>
    <div class="content">
        <p>
            <strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs. <br><br>
            <strong>Step 2:</strong> Determines the duration (T), which is the time required to complete each activity.<br><br>
            <strong>Step 3:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.<br><br>
            <strong>Step 4:</strong> Performs a Forward Pass. <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b> Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the EF by adding the duration of the activity to its ES. <br><br>
            <center><i>EF = ES + T</i></center><BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> This process continues until the ES and EF have been calculated for all activities. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0. <br><br>
            <strong>Step 5:</strong> Performs a Backward Pass. <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b>  Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT) <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network. <br> <br>
            <center><i>LS = LF - T</i></center><BR>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project. <br><br>
            <strong>Step 6:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path. <br><br>
        </p>
    </div>
    </section>

<div class="ganttchartname">
        <b> Project Gantt Chart</b>
</div>
<!-- CHART -->
<div class="ganttcontainer" style="max-width: 100%; margin: 0 auto; padding: 50px;">
       <div class="chart" style="display: grid; position: relative; overflow: hidden; overflow-x:auto">
        <table class="gantt-chart">
            <tr>
                <th style="border-bottom-style: ridge; border-right-style: ridge;"></th>
                <?php
                    for ($col = 1; $col <= $finish_time+1; $col++) { 
                        if ($col == ceil($finish_time)) { ?>
                            <th style="border-bottom-style: ridge;"></th>
                        <?php } 
                        else { ?>
                            <th style="border-bottom-style: ridge; text-align: right;"><?php echo "$col"; ?></th>
                        <?php } 
                    } ?>
            </tr>
            <?php
                foreach ($project as $task) { ?>
                <tr>
                    <th style="border-bottom-style: ridge; border-right-style: ridge;"><?php echo "Activity " . $task['id']; ?></th>
                    <th style="border-bottom-style: ridge;" colspan="<?php echo ceil($finish_time);?>">
                        <?php 
                                $waiting = ($task['es']/$finish_time)*100;
                                $progress = (($task['lf']-$task['es'])/$finish_time)*100;
                                $total_time = $finish_time/ceil($finish_time)*100;
                        ?>
                        <div style="background-color:#B19090; width: <?php echo $total_time;?>%">
                            <div class="waiting" style="position: relative; float: left; display: inline-block; width: <?php echo $waiting?>%"></div>
                            <div class="progress" style="position: relative; float: left; display: inline-block; width: <?php echo $progress?>%"></div>
                        </div>
                    </th>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

