<div class="firstpg">
    <div class="title">
        <b> BETA-PERT Distribution</b>
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
    <!-- <div class="grid-item">
    </div> -->
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
<div class="container" style="max-width: 100%; margin: 0 auto; padding: 50px;">
    <div class="chart" style="display: grid; border: 2px solid #000; position: relative; overflow: hidden;">

        <div class="chart-row chart-period">
            <div class="chart-row-item"></div>
            <!-- loop according to project completion time -->
            <?php
            for ($col = 1; $col <= $finish_time; $col++) { ?>
                <span><?php echo $col; ?></span>
            <?php } ?>
        </div>

        <div class="chart-row chart-lines">
            <!-- loop according to project completion time -->
            <?php
            //$finish_time += 1;
            for ($col = 1; $col <= $finish_time; $col++) { ?>
                <span></span>
            <?php } ?>
        </div>

        <?php
        $qty -= 1;
        foreach ($project as $task) { ?>
            <div class="chart-row">
                <div class="chart-row-item"><?php echo "Activity " . $task['id']; ?></div>
                <ul class="chart-row-bars">
                    <li class="" style="grid-column: <?php echo $task['es'] + 1; ?>/<?php echo $task['lf'] + 1; ?>; background-color: #588BAE;"><?php echo $task['desc']; ?></li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<style>
    .title {
        font-size: 2rem;
        text-align: center;
        margin: 1rem;
    }
    .ganttchartname
    {
        font-size: 2rem;
        text-align: center;
        margin: .1rem 2rem .1rem 2rem;
    }
    .paragone {
        font-size: 24px;
        font-style: normal;
        text-align: justify;
        margin: 2rem 5rem;
    }

    .calculate {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2rem;
    }

    .grid-container {
        display: grid;
        width: 90rem;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .export {
        text-align: right;
    }

    .btn {
        text-decoration: none;
        text-align: right;
        font-size: 1.2rem;
        color: #eeee;
        background-color: #B19090;
        border-radius: 40px;
        display: inline-block;
        padding: 10px 20px;
        border-color: #544141;
        margin-bottom: 2rem;
    }

    .btn:hover {
        background-color: #eeee;
        color: #B19090;

    }

    /* TABLE */
    table {
        padding: 1rem;
        margin-top: 3rem;
        margin-bottom: 2rem;
        margin-left: auto;
        margin-right: auto;
        align-items: center;
        border-spacing: 0;
        border: none;
        border-collapse: collapse;
        border-style: none;
        text-align: center;
        background-color: #eeee;
        
    }

    td,
    th 
    {
        border: none;
        border-collapse: collapse;
        border-style: none;
        text-align: center;
        padding: .5rem .8rem;
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        border-radius: 0;
        background-color: transparent;
    }
    tr 
    {
     border-bottom: 1px solid #ddd;
    }
    td{
        background-color: #eeee;
    }

    th{
        background-color: #d9c7c7;
    }

    /* Cards */
    .container {
        justify-content: space-evenly;
        display: flex;
        width: auto;
        height: auto;
        margin-bottom: 1.4rem;
    }

    .box {
        width: 30%;
        height: auto;
        padding: 3px 2px 25px 2px;
        border: 1px solid #ccc;
        margin: 5vh;
        background: white;
        border-radius: 10px;
        transition: 0.9;
    }

    .box:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
        cursor: pointer;
    }

    h3 {
        font-size: 20px;
        padding: 5px 5px;
        text-align: center;
        color: rgb(104, 92, 92);
    }

    p {
        font-size: 18px;
        padding: 5px;
        text-align: center;
    }

    /* RESPONSIVE */
    @media screen {
        .form {
            background-color: #f0f0f0;
            margin: 3rem 10rem 2rem;
            border-radius: 1.2rem;
            padding: 0.25rem;
        }
    }

    .chart {
        display: grid;
        border: 2px solid #000;
        position: relative;
        overflow: hidden;
    }

    .chart-row {
        display: grid;
        grid-template-columns: 80px 1fr;
        background-color: #DCDCDC;
    }

    .chart-row:nth-child(odd) {
        background-color: #C0C0C0;
    }

    .chart-period {
        color: #fff;
        background-color: #708090 !important;
        border-bottom: 2px solid #000;
        grid-template-columns: 50px repeat(12, 1fr);
    }

    .chart-lines {
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: transparent;
        grid-template-columns: 80px repeat(12, 1fr);
    }

    .chart-period>span {
        text-align: center;
        font-size: 13px;
        align-self: center;
        font-weight: bold;
        padding: 15px 0;
    }

    .chart-lines>span {
        display: block;
        border-right: 1px solid rgba(0, 0, 0, 0.3);
    }

    .chart-row-item {
        background-color: #808080;
        border: 1px solid #000;
        border-top: 0;
        border-left: 0;
        padding: 20px 0;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        width: 80px;
    }

    .chart-row-bars {
        list-style: none;
        display: grid;
        padding: 15px 0;
        margin: 0;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 10px 0;
        border-bottom: 1px solid #000;
    }

    ul .chart-li-one {
        grid-column: 1/2;
        background-color: #588BAE;
    }
</style>