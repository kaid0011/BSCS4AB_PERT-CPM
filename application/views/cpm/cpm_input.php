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
      affecting the project's overall duration.</p> </div>
      <div class="howto">
       <h2>How To?</h2>
       <ul>
        <li>
            <p>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its 
        pre-requisite/s.</p>
        </li>
        <li>
            <p>After completing the table, click 'Calculate' to schedule your project. A table will show the following 
information for your project: <i> Activity, Description, Three Durations, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i></p>
        </li>
    </ul>
       
     </div>
    </div>
</div>
<div class="container" style="overflow-x:auto;">
      <table class="table">
        <thead>
            <tr>
                <th>Activity</th>
                <th title ="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                <th title ="Estimated Activity Duration">Duration <span class="tooltiptext">&#9432;</span></th>
                <th title ="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
            </tr>
        </thead>
        <tbody>
            <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo 'cpm'; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>"></td>
                        <td><input type="number" name="task_time_<?php echo $i; ?>" min="1" max="20" step="any" oninput="validity.valid||(value='');" required></td>
                        <td><?php
                            if ($i == 1) {
                            ?>
                                <input type="text" name="task_prereq_<?php echo $i; ?>" value="-" readonly>
                            <?php
                            } else { ?>
                                <input type="text" name="task_prereq_<?php echo $i; ?>" pattern="[1-<?php echo $i-1; ?>](,[1-<?php echo $i-1; ?>])*|^[\-]" 
                                oninvalid="this.setCustomValidity('bawal yan haha XD')" onchange="this.setCustomValidity('')" required>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
                ?>
        </tbody>
    </table>
</div>
<br><br>
<div class="calculate">
        <button class="btn">Calculate</button>
    </div>
</form>
<div class="box">
	<a class="button" href="#popup1"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
    </div>
    <br>
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Must Know!</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                    <b>• Activity</b>
                   <br>
                    The activity column is auto iterated from 1 by the system and cannot be changed.<br>
                    <b>• Description</b>
                   <br>
                    Description of each activity with a maximum of 50 characters. <br>
                    <i>This is an optional input</i><br>
                    <b>• Duration</b><br>
                    The length of time required to complete each activity.
                    Duration must be a positive integer. Decimals are accepted.<br>
                   <b> • Pre-requisites </b><br>
                    The activity/s that must be completed before the current activity starts. 
                    The first activity's pre-requisite is automatically set to '-' that means none.
                    Pre-requisites of each activity must be existing activity numbers separated by commas without 
                    spaces. If there are no pre-requisites, enter '-'<br>
            </div>
        </div>
    </div>
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
    </section></div>