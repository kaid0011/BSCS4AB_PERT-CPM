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
                                    <td><input type="number" name="task_time_<?php echo $i; ?>" id="task_time_<?php echo $i; ?>" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" value="<?php echo $task['time']; ?>" required></td>
                                    <td><?php
                                        if ($i == 1) {
                                        ?>
                                            <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="-" readonly>
                                            <?php
                                        } else {
                                            $x = $i - 1;
                                            if ($i <= 10) {
                                            ?>
                                                <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" pattern="[1-<?php echo $x; ?>](;[1-<?php echo $x; ?>])*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" value="<?php echo $task['prereq']; ?>" required>
                                            <?php
                                            } else if ($i > 10) {
                                                $y = $i - 11;
                                            ?>
                                                <input type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" pattern="([1-9]|1[0-<?php echo $y; ?>])(;([1-9]|1[0-<?php echo $y; ?>]))*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" value="<?php echo $task['prereq']; ?>" required>
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
        </div>
    </div>
</div>