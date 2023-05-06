<div class="firstpg">
    <div class="title">
        <b> Triangular Distribution </b>
    </div>
    <div class="paragone">
        Triangular distribution: In a triangular distribution, the probability of an
        event occurring is highest at the most likely value, and decreases as the
        values move away from the most likely value.  Triangular distributions are
        often used in scheduler calculators to represent task durations that have a
        range of possible values, but are most likely to fall within a specific range.
        <br><br>
        <div class="howto">
            <b> How To?</b><br>
            • For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
            pre-requisite/s. <br>
            • After completing the table, click 'Calculate' to schedule your project. A table will show the following
            information for your project: <i> Activity, Description, Three Durations, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i><br>
            • After generating the results of your input, you will have a choice to download an Excel file containing all the simulation results by clicking on "Export Results" or "Export Simulation Values"<br>
        </div>
    </div>

</div>
<div class="container" style="overflow-x:auto;">
    <table class="table">
    <thead>
            <tr>
                <th>Activity</th>
                <th title ="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                <th title ="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                <th title ="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
            </tr>
        </thead>
        <tbody>
        <form action="<?php echo base_url('triangular/calculate') ?>" method="post">
            <?php
            for ($i = 1; $i <= $proj_len; $i++) {
            ?>
                <tr>
                    <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                    <td><input type="text" name="task_desc_<?php echo $i; ?>" ></td>
                    <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any" min="1" max="20" oninput="validity.valid||(value='');" required></td>
                    <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any" min="1" max="20" oninput="validity.valid||(value='');" required></td>
                    <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any" min="1" max="20" oninput="validity.valid||(value='');" required></td>
                    <td><?php
                        if ($i == 1) {
                        ?>
                            <input type="text" name="task_prereq_<?php echo $i; ?>" value="-" readonly>
                        <?php
                        } else { ?>
                            <input type="text" name="task_prereq_<?php echo $i; ?>" pattern="[1-<?php echo $i-1; ?>](,[1-<?php echo $i-1; ?>])*|^[\-]" 
                            oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
                        <?php } ?>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>
    </table>
</div>
<input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
<input type="text" name="choice" value="<?php echo 'cpm'; ?>" hidden>
<input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
<br><br>
<div class="trials">
    Number of Trials: <br><br>
    <input type="numbers" name="N" min="1" max="1000" oninput="validity.valid||(value='');" placeholder="Max. 1000" required>
</div>
<br>
<div class="calculate">
    <button class="btn">Calculate</button>
</div>
</form>
<br><br>
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
                    <b>• Optimistic</b><br>
                    The minimum amount of time required to finish a task, assuming that the progress is faster than
                    the typical expectations.
                    Optimistic duration must be a positive integer. Decimals are accepted.<br>
                    <b>• Most Likely</b><br>
                    The expected duration for completing a task, assuming that progress is in accordance with 
                    standard expectations. Most Likely duration must be a positive integer. Decimals are accepted. <br>
                    <b>• Pessimistic</b><br>
                    The maximum amount of time required to complete a task, assuming everything that could 
                    possibly go wrong, actually goes wrong. <br>
                    Pessimistic duration must be a positive integer. Decimals are accepted.<br>
                   <b> • Pre-requisites </b><br>
                    The activity/s that must be completed before the current activity starts. 
                    The first activity's pre-requisite is automatically set to '-' that means none.
                    Pre-requisites of each activity must be existing activity numbers separated by commas without 
                    spaces. If there are no pre-requisites, enter '-'<br>
                    <b> • Number of Trials </b><br>
                    The number of trials you want the simulation to perform.
                    The simulation used is Monte Carlo Simulation. <br>
                    Number of Trials must be a positive integer between 1 to 1000.
                    <br>
            </div>
        </div>
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b>  Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT) <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network. <br> <br>
        <center><i>LS = LF - T</i></center><BR>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project. <br><br>
        <strong>Step 8:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path. <br><br>
    </p>
  </div>
</section>