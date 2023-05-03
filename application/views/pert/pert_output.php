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
                    <th title ="The calculated Standard Deviation of Each Activity">Standard Deviation <span class="tooltiptext">&#9432;</span></th>
                    <th title ="The calculated Variance of Each Activity">Variance</th>
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
        </table>
        
    </div>
    </div>
    <!-- <div class="grid-item"> -->

    <!-- <h4>Project Completion Time: <?php echo $finish_time; ?></h4>
        <h4>Project Variance: <?php echo round($proj_variance, 2); ?></h4>
        <h4>Project Standard Deviation: <?php echo round($proj_sd, 2); ?></h4>

        <!-- Probability of Project Completion by Given Date 
        <h3>Compute Project Completion Probability</h3>
        <label for="pcg">Enter expected project duration: </label>
        <input type="number" name="x" id="x" required>
        <input type="number" name="m" id="m" value="<?php echo round($finish_time, 2); ?>" hidden>
        <input type="number" name="s" id="s" value="<?php echo round($proj_sd, 2); ?>" hidden>
        <button id="compute" class="compute">Calculate</button>
        <br><label for="p">Probability of completion: </label>
        <input type="textp" name="p" id="p" readonly>

        <!-- Probability of Individual Task Completion Completion by Given Date
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
        <!-- <a class="btn" href="CPMOutput.html">Calculate</a> 
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
        border-radius: 10px;
        overflow-x: auto;
    }
    .container
    {
        width: 99rem;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
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
    }

    .btn:hover {
        background-color: #eeee;
        color: #B19090;

    }

    .compute {
        text-decoration: none;
        text-align: right;
        font-size: 1rem;
        color: #eeee;
        background-color: #B19090;
        border-radius: 10px;
        display: inline-block;
        padding: 10px 20px;
        border: 1px solid;
    }

    .compute:hover {
        background-color: #eeee;
        color: #B19090;

    }
    .compute_indiv {
        text-decoration: none;
        text-align: right;
        font-size: 1rem;
        color: #eeee;
        background-color: #B19090;
        border-radius: 10px;
        display: inline-block;
        padding: 10px 20px;
        border: 1px solid;
    }

    .compute_indiv:hover {
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

    textarea
    {
        background-color: transparent;
        border: 2px solid;
        border-radius: 10px;
        padding: 3px;
        resize: none;
        margin: 5px;
    }

    input[type=text1]
    {
        border-style: none;
        text-align: center;
    }
    input[type=number]
    {
        border-style: none;
        text-align: center;
        border: 1px solid;
        border-radius: 5px;
    }

    input[type=textp]
    {
        border-style: none;
        text-align: center;
        font-size: 20px;
    }

    input
    {
        background-color: transparent;
        border-radius: 10px;
        padding: 5px;
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

    .containerbox2 {
        justify-content: space-evenly;
        display: flex;
        width: auto;
        height: auto;
    }

    .boxx2 {
        width: 30%;
        height: auto;
        padding: 1.5rem;
        border: 1px solid #ccc;
        margin: 5vh;
        background: white;
        border-radius: 10px;
        transition: 0.9;
    }

    .boxx2:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
        cursor: pointer;
    }

    #two
    {
        font-size: 20px;
        padding: 5px 5px;
        text-align: center;
        color: rgb(104, 92, 92);
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
    
    .ganttcontainer {
            display: grid;
            width: 85%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            overflow-x: auto;
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
        table-layout: auto;
        /* background-color: #eeee; */
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
        background-color: #eeee;
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

    /* RESPONSIVE */
    @media screen {
        .form {
            background-color: #f0f0f0;
            margin: 3rem 10rem 2rem;
            border-radius: 1.2rem;
            padding: 0.25rem;
        }
    }

   
    @media only screen and (max-width: 1500px) and (min-width: 300px)
    {
        .grid-item
        {
            margin-left: 5vh;
            margin-right: 5vh;
        }

        .containerbox, .containerbox2
        {
            display: block;
            margin: 3vh;
        }

        .boxx, .boxx2
        {
            width: 90%;
        }
    }
</style>

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