<!-- Body  -->
<div class="firstpg">
    <div class="title">
        <b> CRITICAL PATH METHOD</b>
    </div>
    <div class="paragone">
        CPM calculates the earliest and latest start and finish times for each activity,
        allowing project managers to determine which activities can be delayed without
        affecting the project's overall duration.
        <br><br>
            This table shows the project time completion based on the data provided using the CPM Method:
    </div>
</div>
<div class="grid-container">
    <div class="container" style="overflow-x:auto;">
        <table class="results">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Pre-Requisites</th>
                    <th>ES</th>
                    <th>EF</th>
                    <th>LS</th>
                    <th>LF</th>
                    <th>Slack</th>
                    <th>Critical</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($project as $task) {
                    ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['desc']; ?></td>
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
</div>

<!-- CARDS -->
<div class="containerbox">
        <div class="boxx">
            <h3>Critical Path</h3>
        </div>

        <div class="boxx">
            <h3>Project Finish Time</h3>
        </div>
</div>

<!-- BUTTON -->
<div class="calculate">
        <!-- <a class="btn" href="CPMOutput.html">Calculate</a> -->
        <button class="btn">Export to CSV</button>
</div>

<!-- EXPLANATION -->
<div class="paragone">
    Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
    feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
    exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
    <br><br>
    Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
    vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
    adversarium, dicam appetere necessitatibus sed ut.
</div>

<!-- CHART -->
<div class="container" style="max-width: 100%; margin: 0 auto; padding: 50px;">
       <div class="chart" style="display: grid; border: 2px solid #000; position: relative; overflow: hidden;">
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


<style>
    .title {
        font-size: 2rem;
        text-align: center;
        margin: 1rem;
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

    /* Gantt Container */
    .grid-container-gantt {
        display: grid;
        width: 85%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .btn {
        text-decoration: none;
        text-align: center;
        font-size: 1.2rem;
        color: #eeee;
        background-color: #B19090;
        border-radius: 40px;
        display: inline-block;
        padding: 10px 20px;
        border-color: #544141;
    }

    .btn:hover {
        background-color: #eeee;
        color: #B19090;

    }

    /* TABLE */
    table.results {
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

    table.results th,
    table.results td {
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

    table.gantt-chart {
        margin-top: 2rem;
        margin-bottom: 1rem;
        display: table;
        border-collapse: collapse;
        align-items: justify;
        width: 100%;
        border-spacing: 0;
        border: none;
        border-collapse: collapse;
        text-align: center;
        border-style: ridge;
        table-layout: fixed;
    }

    table.results tr 
    {
     border-bottom: 1px solid #ddd;
    }
    table.results td{
        background-color: #eeee;
    }

    table.results th{
        background-color: #d9c7c7;
    }

    table.gantt-chart th,
    table.gantt-chart td {
        white-space: nowrap;
        border: none;
        border-collapse: collapse;
        text-align: center;
        padding: 12px 5px;
        display: table-cell;
        vertical-align: middle;
    }

    .waiting 
    {
    height:30px;
    position:relative;
    background: none;
    }

    .progress {
    height:30px;
    position:relative;
    background: #B19090;
    border: 0px;
    border-radius: 10px;
    }

    /* Cards */
    .containerbox {
        justify-content: space-evenly;
        display: flex;
        width: auto;
        height: auto;
    }

    .boxx {
        width: 30%;
        height: auto;
        padding: 3px 2px 25px 2px;
        border: 1px solid #ccc;
        margin: 5vh;
        background: white;
        border-radius: 10px;
        transition: 0.9;
    }

    .boxx:hover {
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
</style>