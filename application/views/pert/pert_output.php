<div class="firstpg">
    <div class="title">
        <b> Project Evaluation Review Technique (PERT)</b>
    </div>
    <div class="paragone">
        PERT uses a probabilistic approach to determine the project's critical path and the probability of
        completing the project within a specific timeframe.
        <br><br>
        This table shows the project time completion based on the data provided using the PERT Method:
    </div>
</div>
<div class="grid-container">
    <div class="container" style="overflow-x:auto;">
        <table class="results">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th title ="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Estimated Activity Completion based on OT, MLT, and PT">Estimated Duration <span class="tooltiptext">&#9432;</span></th>
                    <th title ="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
                    <th title ="The calculated Standard Deviation of Each Activity">Standard Deviation <span class="tooltiptext">&#9432;</span></th>
                    <th title ="The calculated Variance of Each Activity">Variance <span class="tooltiptext">&#9432;</span></th>
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
                        <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                        <td>
                            <?php echo round($task['time'], 2) . " " . $task['unit']; ?>
                            <input type="number" name="m" id="m_<?php echo $task['id']; ?>" value="<?php echo round($task['time'], 2); ?>" hidden>
                        </td>
                        <td><?php
                            $pre = implode(",", $task['prereq']);
                            if ($pre == '-1') {
                                $pre = '-';
                            }
                            echo $pre;
                            ?></td>
                        <td>
                            <?php echo round($task['sd'], 2); ?>
                            <input type="number" name="s" id="s_<?php echo $task['id']; ?>" value="<?php echo round($task['sd'], 2); ?>" hidden>
                        </td>
                        <td><?php echo round($task['v'], 2); ?></td>
                        <td><?php echo round($task['es'], 2); ?></td>
                        <td><?php echo round($task['ef'], 2); ?></td>
                        <td><?php echo round($task['ls'], 2); ?></td>
                        <td><?php echo round($task['lf'], 2); ?></td>
                        <td><?php echo round($task['slack'], 2); ?></td>
                        <td><?php echo $task['isCritical']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<!-- <div class="grid-item"> -->

<!-- <h4>Project Completion Time: <?php echo $finish_time; ?></h4>
    <h4>Project Variance: <?php echo round($proj_variance, 2); ?></h4>
    <h4>Project Standard Deviation: <?php echo round($proj_sd, 2); ?></h4>

    Probability of Project Completion by Given Date 
    <h3>Compute Project Completion Probability</h3>
    <label for="pcg">Enter expected project duration: </label>
    <input type="number" name="x" id="x" required>
    <input type="number" name="m" id="m" value="<?php echo round($finish_time, 2); ?>" hidden>
    <input type="number" name="s" id="s" value="<?php echo round($proj_sd, 2); ?>" hidden>
    <button id="compute" class="compute">Calculate</button>
    <br><label for="p">Probability of completion: </label>
    <input type="textp" name="p" id="p" readonly>

    Probability of Individual Task Completion Completion by Given Date
    <h3>Compute Individual Task Completion Probability</h3>
    <label for="id">Enter Task ID: </label>
    <input type="number" name="tid" id="tid">
    <label for="x_indiv">Enter expected task duration: </label>
    <input type="number" name="x_indiv" id="x_indiv">
    <button id="compute_indiv" class="compute_indiv">Calculate</button>
    <br><label for="p">Probability of completion: </label>
    <input type="textp" name="p_indiv" id="p_indiv" readonly>
    </tbody>
    </table>
    <div class="calculate">
    <a class="btn" href="CPMOutput.html">Calculate</a> 
    <button class="btn">Calculate</button>
</div> -->

<!-- CARDS 1 -->
<div class="containerbox">
    <div class="box1">
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

        <h3>Project Completion Time</h3>
        <p>
            <?php echo $finish_time; ?>
        </p>
    </div>

    <div class="box1">
        <h3>Project Variance</h3>
        <p>
            <?php echo round($proj_variance, 2); ?>
        </p>
        <h3>Project Standard Deviation</h3>
        <p>
            <?php echo round($proj_sd, 2); ?>
        </p>
    </div>
</div>

<!-- BUTTON -->
<div class="export-results">
    <button class="expbtn">Export Results</button>
</div>
    <section class="collapsible">
    <input type="checkbox" name="collapse" id="handle1" checked="checked">
    <h2 class="handle">
        <label for="handle1">How BETA-PERT Distribution Works: (Step by Step)</label>
    </h2>
    <div class="content">
        <p>
            <strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs. <br><br>
            <strong>Step 2:</strong>Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times provided by the user for each activity that are required to complete the activities.<br><br>
            <strong>Step 3:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.<br><br>
            <strong>Step 3:</strong> Calculates the duration (T) by getting the mean of the 3 durations.
            <center><img align="center" src="//i.upmath.me/svg/%24%24T%3D%20%5Cmu%20%3D%20%20%7Ba%2B4m%2Bb%5Cover%206%7D"> </center> 
            <br><br>
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
        <b> Completion Probability Calculator</b>


</div>

<!-- EXPLANATION -->
<div class="paragone">
Our PERT Calculator also enables users to determine the probability of an expected duration
    <br><br>
    <b>Project Completion Probability</b>: Calculate the probability of an expected project completion time for the whole project <br>
    <br>
       <b> How To?</b><br>
       • Enter your expected project duration. <br>
       • Click 'Calculate' and wait for the probability to show.
       <br><br>
    <b>Activity Completion Probability</b>: Calculate the probability of an expected duration of a specific activity     <br>
    <br>
       <b> How To?</b><br>
       • Enter the Activity Number of the duration you want to compute.<br>
       • Enter your expected activity duration.<br>
       • Click 'Calculate' and wait for the probability to show.<br>

</div>

<!-- CARDS 2 -->

<div class="containerbox">
    <div class="box2">
        <center>
            <b style="font-size:20px; color: rgb(104, 92, 92);"> Compute Project Completion Probability </b>
            <h3 id="two">Expected Project Duration</h3>
            <!-- <label for="pcg">Enter expected project duration: </label><br><br> -->
            <input type="number" name="x" id="x" required>
            <input type="number" name="m" id="m" value="<?php echo round($finish_time, 2); ?>" hidden>
            <input type="number" name="s" id="s" value="<?php echo round($proj_sd, 2); ?>" hidden>
            <br><br>
            <button id="compute" class="compute">Calculate</button>

            <!-- <label for="p">Probability of completion: </label>
        <input type="textp" name="p" id="p" readonly> -->
            <h3 id="two">Probability of Completion</h3>
            <input type="textp" name="p" id="p" readonly>
        </center>
    </div>

    <div class="box2">
        <center>
            <b style="font-size:20px; color: rgb(104, 92, 92);"> Compute Individual Task Completion Probability </b>
            <h3 id="two">Activity ID: </h3>
            <input type="number" name="tid" id="tid">
            <h3 id="two">Expected Project Duration: </h3>
            <input type="number" name="x_indiv" id="x_indiv"> <br><br>
            <button id="compute_indiv" class="compute_indiv">Calculate</button>
            <h3 id="two">Probability of Completion</h3>
            <input type="textp" name="p_indiv" id="p_indiv" readonly>
        </center>
    </div>
</div>

<br>
<div class="ganttchartname">
        <b> Project Gantt Chart</b>
</div>

<!-- CHART -->
<div class="ganttcontainer" style="max-width: 100%; margin: 0 auto; padding: 30px;">
       <div class="chart" style="display: grid; position: relative; overflow: hidden; overflow-x:auto">

<!-- GANTT CHART -->
<div class="grid-container-gantt">
    <div style="overflow-x: auto;">
        <table class="gantt-chart">
            <thead>
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
            </thead>
            <tbody>
            <?php
            foreach ($project as $task) { ?>
                <tr>
                    <td style="border-bottom-style: ridge; border-right-style: ridge;"><strong><?php echo "Activity " . $task['id']; ?></strong></td>
                    <td style="border-bottom-style: ridge;" colspan="<?php echo ceil($finish_time); ?>">
                        <?php
                        $waiting = ($task['es'] / $finish_time) * 100;
                        $progress = (($task['lf'] - $task['es']) / $finish_time) * 100;
                        $total_time = $finish_time / ceil($finish_time) * 100;
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
<br> <br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AJAX for Project Completion Probability -->
<script>
    $(document).ready(function() {
        $(".compute").click(function() {
            var x = $("#x").val();
            var m = $("#m").val();
            var s = $("#s").val();

            $.ajax({
                url: "<?php echo base_url(); ?>Probability/compute",
                type: "post",
                dataType: "json",
                data: {
                    x: x,
                    m: m,
                    s: s
                },
                success: function(data) {
                    if (data.response == "success") {
                        // alert(data.p);
                        $('#p').val(data.p);
                    } else {
                        alert("Calculate failed");
                    }
                }
            });
        });
    });
</script>
<!-- AJAX for Individual Task Completion Probability -->
<script>
    $(document).ready(function() {
        $(".compute_indiv").click(function() {
            var id = $("#tid").val();
            var x = $("#x_indiv").val();
            var m = $("#m_" + id).val();
            var s = $("#s_" + id).val();

            $.ajax({
                url: "<?php echo base_url(); ?>Probability/compute",
                type: "post",
                dataType: "json",
                data: {
                    x: x,
                    m: m,
                    s: s
                },
                success: function(data) {
                    if (data.response == "success") {
                        // alert(data.p);
                        $('#p_indiv').val(data.p);
                    } else {
                        alert("Calculate failed");
                    }
                }
            });
        });
    });
</script>