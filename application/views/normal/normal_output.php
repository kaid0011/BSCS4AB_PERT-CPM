<div class="outputpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Normal Distribution</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>Normal Distribution or Standard Normal Distribution is a probability function that describes how the values of a variable are distributed. This is considered to be the most important probability distribution in statistics due to the fact that a lot of continuous data in the aspects of nature and psychology display a bell-shaped curve in compilation and graphing. It accurately models natural events. In practice, the normal distribution is also used to model non-negative distributions
                    </p>
                </div>
            </div>
        </div>
        <div>
            <?php if($_SESSION['new'] == 'true') { ?>
                <button type="button" onclick="createNew()">Create New</button>
            <?php } else { ?>
                <button type="button" onclick="editData()">Edit Data</button>
            <?php } ?>
        </div>
        <div class="grid-container">
            <div class="normalcontainer">
                <table class="results">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th title="Activity Name">Name </th>
                            <th title="Activity Description">Description </th>
                            <th title="Shortest Estimated Activity Duration">Optimistic </th>
                            <th title="Reasonable Estimated Activity Duration">Most Likely </th>
                            <th title="Maximum Estimated Activity Duration">Pessimistic </th>
                            <th title="Calculated Activity Completion based on OT, MLT, and PT">Calculated Duration </th>
                            <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                            <th class="short" title="mean">Mean </th>
                            <th title="sd">Standard Deviation </th>
                            <th title="variance">Variance </th>
                            <th class="short" title="Activity's Earliest Start Time">ES </th>
                            <th class="short" title="Activity's Earliest Finish Time">EF </th>
                            <th class="short" title="Activity's Latest Start Time">LS </th>
                            <th class="short" title="Activity's Latest Finish Time">LF </th>
                            <th class="short" title="Activity's Available Slack Time">Slack </th>
                            <th title="If the Activity is Critical">Critical </th>
                            <th title="">Priority Level </th>
                            <th title="">Type </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $project = $_SESSION['project'];
                        foreach ($project as $task) {
                        ?>
                            <tr>
                                <td><?php echo $task['taskid']; ?></td>
                                <td><?php echo $task['name']; ?></td>
                                <td><?php echo $task['desc']; ?></td>
                                <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                                <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                                <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                                <td><?php echo number_format((float)$task['time'], 2, '.', '') . " " . $task['unit']; ?></td>
                                <td><?php echo $task['prereq']; ?></td>
                                <td><?php echo number_format((float)$task['mean'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['sd'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['v'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['es'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['ef'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['ls'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['lf'], 2, '.', ''); ?></td>
                                <td><?php echo number_format((float)$task['slack'], 2, '.', ''); ?></td>
                                <td><?php echo $task['isCritical'] == 1 ? "Yes" : "No"; ?></td>
                                <td><?php echo $task['priorityLvl']; ?></td>
                                <td><?php echo $task['type']; ?></td>
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
                        $max = max(array_column($cp, 'taskid'));
                        foreach ($cp as $cp) {
                            if ($cp['taskid'] == $max) {
                                echo $cp['taskid'];
                            } else {
                                echo  $cp['taskid'] . " → ";
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
                    <input type="hidden" name="<?php echo $task['taskid']; ?>" value="<?php echo $task['taskid']; ?>">
                    <input type="hidden" name="desc_<?php echo $task['taskid']; ?>" value="<?php echo $task['desc']; ?>">
                    <input type="hidden" name="opt_<?php echo $task['taskid']; ?>" value="<?php echo $task['opt']; ?>">
                    <input type="hidden" name="ml_<?php echo $task['taskid']; ?>" value="<?php echo $task['ml']; ?>">
                    <input type="hidden" name="pes_<?php echo $task['taskid']; ?>" value="<?php echo $task['pes']; ?>">
                    <input type="hidden" name="time_<?php echo $task['taskid']; ?>" value="<?php echo $task['time']; ?>">
                    <input type="hidden" name="pre_<?php echo $task['taskid']; ?>" value="<?php echo $task['prereq']; ?>">
                    <input type="hidden" name="es_<?php echo $task['taskid']; ?>" value="<?php echo $task['es'];; ?>">
                    <input type="hidden" name="ef_<?php echo $task['taskid']; ?>" value="<?php echo $task['ef']; ?>">
                    <input type="hidden" name="ls_<?php echo $task['taskid']; ?>" value="<?php echo $task['ls']; ?>">
                    <input type="hidden" name="lf_<?php echo $task['taskid']; ?>" value="<?php echo $task['lf']; ?>">
                    <input type="hidden" name="slack_<?php echo $task['taskid']; ?>" value="<?php echo $task['slack']; ?>">
                    <input type="hidden" name="ic_<?php echo $task['taskid']; ?>" value="<?php echo $task['isCritical']; ?>">
                <?php } ?>
                <input type="hidden" name="len" value="<?php echo $len; ?>">
                <center><button class="expbtn">Export Results</button></center>
            </form>
        </div>
        <?php if($_SESSION['new'] == 'true') { ?>
            <div class="export">
                <!-- Export Simulation Values Excel File -->
                <form action="<?php echo base_url('export/simu') ?>" method="post">
                    <?php
                    foreach ($project as $sim) {
                        $id = $sim['taskid'];
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
        <?php }?>  

        <div>
            <?php if($_SESSION['new'] == 'true') { ?>
                <div class="form-group">
                    <label for="UserEmail">Email: </label>
                    <input type="email" name="UserEmail" id="UserEmail" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Reference No.</label>
                    <input type="text" name="ReferenceNo" id="ReferenceNo" value="<?php echo $_SESSION['ReferenceNo']; ?>" readonly>
                </div>
                <button type="button" onclick="addEmail()">Save</button>
            <?php }?>   
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
                                    <td><strong><?php echo "Activity " . $task['taskid']; ?></strong></td>
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
                <label for="handle1">How WAPS' Normal Distribution Works:</label>
            </h2>
            <div class="content">
                <div class="normal">
                    <p><strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                    <p><strong>Step 2:</strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times
                        provided by the user for each activity that are required to complete the activities.</p>
                    <p><strong>Step 3:</strong> Calculates the mean (𝜇) of the 3 durations for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/normal_mean.png') ?>">
                    <p><strong>Step 4:</strong> Calculates the variance (𝜎<sup>2</sup>) of the 3 durations for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/normal_variance.png') ?>">
                    <p><strong>Step 5:</strong> Calculates the standard deviation (𝜎) using the variance for each activity.</p>
                    <img src="<?= base_url('assets/images/howitworks/normal_sd.png') ?>">
                    <p><strong>Step 6:</strong> Computes the duration (T) by using the norm.ppf function from scipy.stats to get the normal distribution value
                        (or the inverse of the cumulative distribution function) for which a given probability is the required value.</p>
                    <div class="func">
                        <div class="title">
                            <p><i>norm.ppf(q, loc=0, scale=1)</i></p>
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
                    <p><strong>Step 7:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                    <p><strong>Step 8:</strong> Performs a Forward Pass.</p>

                    <ol type="a">
                        <li>
                            <p>Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity.
                            </p>
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
                    <p><strong>Step 9:</strong> Performs a Backward Pass.</p>
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
                    <p><strong>Step 10:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function addEmail() {
        var Form = new FormData();
        var UserEmail = document.getElementById("UserEmail").value;
        var ReferenceNo = document.getElementById("ReferenceNo").value;

        Form.append("UserEmail", UserEmail);
        Form.append("ReferenceNo", ReferenceNo);

        $.ajax({
            url: "<?php echo base_url(); ?>main/addEmail",
            method: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: Form,
            success: function(data) {
                alert("Email added successfully");
            },
            error: function(err) {
                console.log(err);
            }
        }); 
    }

    function createNew() {
        if(confirm("Are you sure you want to create a new project?"))
        {
            window.location.href = "<?php echo base_url(); ?>main";
        }        
        return false;
    }

    function editData() {
        window.location.href = "<?php echo base_url(); ?>normal/editnormal";
    }
</script>