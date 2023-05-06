<div class="firstpg">
    <div class="title">
        <b> CRITICAL PATH METHOD </b>
    </div>
    <div class="paragone">
    CPM calculates the earliest and latest start and finish times for each activity, 
      allowing project managers to determine which activities can be delayed without 
      affecting the project's overall duration.<br><br>
      <div class="howto">
       <b> How To?</b><br>
       • For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its 
        pre-requisite/s.  <br>
       • After completing the table, click 'Calculate' to schedule your project. A table will show the following 
information for your project: <i> Activity, Description, Three Durations, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i><br>
       <br><br>
     </div>
    </div>
    <!-- <div class="instructions">
      <p>INSTRUCTIONS:</p>
    <dl>
      <li> DESCRIPTION - Enter the name or description of the activity.</li>
      <li> OPTIMISTIC - Enter the measure of estimated optimistic time.</li>
      <li> PESSIMISTIC - Enter the measure of estimated pessimistic time.</li>
      <li> MOST LIKELY - Enter the measure of estimated most likely time.</li>
      <li> PRE-REQUISITES - Enter the <b>activity number</b> of the required activity.</li>
    </dl>
    </div> -->
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
        <!-- <a class="btn" href="CPMOutput.html">Calculate</a> -->
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
