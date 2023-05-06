<div class="firstpg">
    <div class="title">
        <b> Normal Distribution</b>
    </div>
    <div class="paragone">
        Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
        feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
        exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
        <br><br>
        Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
        vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
        adversarium, dicam appetere necessitatibus sed ut.
    </div>
</div>
<div class="grid-container">
    <div class="grid-item">
        <table class="table">
            <thead>
                <tr>
                <th>Activity</th>
                <th title ="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                <th title ="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                <th title ="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Estimated Activity Completion based on OT, MLT, and PT">Estimated Duration <span class="tooltiptext">&#9432;</span></th>
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
                        <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
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
    <!-- <div class="grid-item">-->
</div>

    <!-- Final Results Display -->
    <div class="container">
        <div class="box">
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
        </div>

        <div class="box">
            <h3>Project Completion Time</h3>
            <p>
                <?php echo $finish_time; ?>
            </p>

        </div>
    </div>
    <div class="export">
        <!-- Export Simulation Values Excel File -->
        <form action="<?php echo base_url('export') ?>" method="post">
            <?php
            foreach ($project as $sim) {
                $id = $sim['id'];
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
            <center><button class="btn">Export to CSV</button></center>
        </form>
    </div>
</div>
<div class="ganttchartname">
        <b> Project Gantt Chart</b>
    </div>

<!-- EXPLANATION -->
<!-- <div class="paragone">
    Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
    feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
    exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
    <br><br>
    Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
    vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
    adversarium, dicam appetere necessitatibus sed ut.
</div> -->

<!-- GANTT CHART -->
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
<br> <br>