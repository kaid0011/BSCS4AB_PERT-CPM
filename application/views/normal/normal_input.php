<div class="body-container">
    <div class="firstpg">
    <div class="title">
        <h1>Normal Distribution</h1>
    </div>
    <div class="paragone">
            <div class="description">
    <p>Normal Distribution or Standard Normal Distribution is a probability function that describes how the values of a variable are distributed. This is considered to be the most important probability distribution in statistics due to the fact that a lot of continuous data in the aspects of nature and psychology display a bell-shaped curve in compilation and graphing. It accurately models natural events. In practice, the normal distribution is also used to model non-negative distributions.</p>
            </div>
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
                        <p>Enter the Number of Trials you desire for the simulation to perform.</p>
                    </li>
                    <li>
                        <p>After generating the results of your input, you will have a choice to calculate completion probability
                            based on your expected duration. There are 2 types: Project Completion Probability and Activity
                            Completion Probability.</p>
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
                <th title ="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                <th title ="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
            </tr>
        </thead>
        <tbody>
        <form action="<?php echo base_url('normal/calculate') ?>" method="post">
            <?php
            for ($i = 1; $i <= $proj_len; $i++) {
            ?>
                <tr>
                    <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                    <td><input type="text" name="task_desc_<?php echo $i; ?>" ></td>
                    <td><input type="number"  name="task_opt_<?php echo $i; ?>" step="any" min="1" max="20" oninput="validity.valid||(value='');" required></td>
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
<br>
<input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
<input type="text" name="choice" value="<?php echo 'cpm'; ?>" hidden>
<input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
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

<!-- POPUP for MUST KNOW -->
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
<!-- Collapsible Step by Step -->

<section class="collapsible">
  <input type="checkbox" name="collapse" id="handle1" checked="checked">
  <h2 class="handle">
    <label for="handle1">How Normal Distribution Works: (Step by Step)</label>
  </h2>
  <div class="content">
    <p>
        <strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs. <br><br>
        <strong>Step 2:</strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times 
            provided by the user for each activity that are required to complete the activities.<br><br>
        <strong>Step 3:</strong> Calculates the mean (𝜇) of the 3 durations for each activity.
        <center><img align="center" src="//i.upmath.me/svg/%5Cmu%20%3D%20%24%24a%2Bm%2Bb%5Cover%203"> </center> 
        <br><br>
        <strong>Step 4:</strong>   Calculates the variance (𝜎<sup>2</sup>) of the 3 durations for each activity.
        <br><br>
        <center><img align="center" src="//i.upmath.me/svg/%5Csigma%5E2%3D%20%24%24%20(a-%5Cmu)%5E2%20%2B%20(m-%20%5Cmu)%5E2%20%2B%20(b-%5Cmu)%5E2%20%5Cover3"> </center> <br>
        <strong>Step 5:</strong> Calculates the standard deviation (𝜎) using the variance for each activity.
        <br><br>
        <center><img align="center" src="//i.upmath.me/svg/%5Csigma%3D%20%5Csqrt%7B%5Csigma%5E2%7D" alt="\sigma= \sqrt{\sigma^2}"> </center> <br>
        <strong>Step 6:</strong> Computes the duration (T) by using the norm.ppf function from scipy.stats to get the normal distribution value 
        (or the inverse of the cumulative distribution function) for which a given probability is the required value. <br><br><i>norm.ppf(q, loc=0, scale=1)</i> <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp; Where: <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 𝑞 = random() <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is a function randomly selects a value which was set from 0.0 to 1.0. It serves as the cumulative probability at which to evaluate the percent point function. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This value undergoes the Monte Carlo Simulation to achieve a more accurate result. The number of trials is based on the user's input. <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 𝑙𝑜𝑐 = 𝜇<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The calculated mean (𝜇) of the 3 durations for each activity. <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 𝑠𝑐𝑎𝑙𝑒 = 𝜎<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The calculated standard deviation (𝜎) of the 3 durations for each activity. <br><br>
        <strong>Step 7:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts. <br><br>
        <strong>Step 8:</strong> Performs a Forward Pass. <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b> Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the EF by adding the duration of the activity to its ES. <br>
        <center><i>EF = ES + T</i></center><BR>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> This process continues until the ES and EF have been calculated for all activities. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0. <br><br>
        <strong>Step 9:</strong> Performs a Backward Pass. <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>a.</b>  Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>b.</b> For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT) <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>c.</b>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network. <br> <br>
        <center><i>LS = LF - T</i></center><BR>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>d.</b> Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>e.</b> Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project. <br><br>
        <strong>Step 10:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path. <br><br>
    </p>
  </div>
</section>
</div>