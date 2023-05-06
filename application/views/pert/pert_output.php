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
    <div class="boxx">
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

    <div class="boxx">
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
    <button class="btn">Export Results</button>
</div>

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

<div class="containerbox2">
    <div class="boxx2">
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

    <div class="boxx2">
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