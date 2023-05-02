<div class="firstpg">
    <div class="title">
        <b> BETA-PERT Distribution </b>
    </div>
    <div class="paragone">
        The BETA-PERT distribution is a type of probability
        distribution that is used in PERT analysis. It combines aspects of both the
        normal and triangular distributions to model uncertainty in task durations.
        <br><br>
        The BETA-PERT distribution is characterized by three parameters: the minimum,
        most likely, and maximum duration for a task. It is often used in scheduler
        calculators to perform simulations that take into account the uncertainty and
        variability of task durations.
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
        <form action="<?php echo base_url('betapert/calculate') ?>" method="post">
            <?php
            for ($i = 1; $i <= $proj_len; $i++) {
            ?>
                <tr>
                    <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                    <!-- <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td> -->
                    <td><textarea  name = "task_desc_<?php echo $i; ?>"></textarea></td>
                    <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
                    <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any" min="1" max="20" oninput="validity.valid||(value='');" required></td>
                    <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
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

    .btn:hover {
        background-color: #eeee;
        color: #B19090;

    }

    .container {
        width: 99rem;
        max-width: 100%;
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

    .trials {
        margin: auto;
        min-width: 15rem;
        max-width: 15rem;
        background-color: #eeee;
        padding: 1rem;
        border-radius: 10px;
    }

    input
    {
        background-color: transparent;
        border-radius: 10px;
        padding: 5px;
    }

    textarea
    {
        background-color: transparent;
        border: 2px solid;
        border-radius: 10px;
        padding: 3px;
        resize: none;
        margin: 3px;
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

    input[type=text1]
    {
        border-style: none;
        text-align: center;
        font-size: 2.5vh;
    }
   
    input[type=numbers]
    {
        width:14rem;
        padding:.5rem;
    }

    /* Input Boxes Style */
    /* input[type=text], input[type=number] 
    {
        padding:3px;
        margin:2px 0;
        width: 80%;
    } */


    /* RESPONSIVE */
    @media screen {
        .form {
            background-color: #f0f0f0;
            margin: 3rem 10rem 2rem;
            border-radius: 1.2rem;
            padding: 0.25rem;
        }

        /* .responsive-table 
        {
        margin-top: 3rem;
        margin-bottom: 2rem;
        margin-left: 4rem;
        margin-right: 4rem;
        align-items: center;

        } */

    }
</style>