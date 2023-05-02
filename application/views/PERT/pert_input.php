<div class="firstpg">
    <div class="title">
        <b> Project Evaluation Review Technique (PERT) </b>
    </div>
    <div class="paragone">
        PERT calculates three time estimates for each activity: optimistic, pessimistic, and most likely. 
      <br>These estimates are then used to calculate the expected time for each activity and the entire project.
    </div>
    <!-- <div class="instructions" style="overflow-x:auto;"> 
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
<br>
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
            <form action="<?php echo base_url('pert/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo 'pert'; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <!--<td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>-->
                        <td><textarea  name = "task_desc_<?php echo $i; ?>"></textarea></td>
                        <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
                        <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
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
    <div class="calculate">
        <!-- <a class="btn" href="PERTOutput.html">Calculate</a> -->
        <button class="btn">Calculate</button>
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

    .instructions
    {
        font-style: normal;
        text-align: justify;
        margin-left: 25rem;
        margin-right: 25rem;
    }

    .instructions p
    {
        font-size: 20px;
    }

    dl
    {
        padding-right: 20rem;
        padding-bottom: 5rem;
    }

    .calculate
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2rem;
    }

    .container
    {
        width: 99rem;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .btn
    {
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

    .btn:hover
    {
        background-color: #eeee;
        color:#B19090;
        
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
        overflow: hidden;
        border-radius: .8em;
        border-collapse: collapse;
        border-style: none;
        text-align: center;
        background-color: #f0f0f0;
        
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
        background-color: #f0f0f0;
    }

    th{
        background-color: #D7D0D0;
        padding: 15px;
        
    }

    input[type=text1]
    {
        border-style: none;
        text-align: center;
        font-size: 2.5vh;
        background-color: transparent;
    }
   
    input[type=numbers]
    {
        width:14rem;
        padding:.5rem;
    }
    input
    {
        /* background-color: transparent; */
        border-radius: 5px;
        border: .5px solid;
        padding: 5px;
    }

    textarea
    {
        /* background-color: transparent; */
        border: .5px solid;
        border-radius: 5px;
        /* padding: 3px; */
        resize: none;
        /* margin: 3px; */
    }
/* RESPONSIVE */
@media screen {
    .form
    {
    background-color: #f0f0f0;
    margin: 3rem 10rem 2rem;
    border-radius: 1.2rem;
    padding: 0.25rem;
    }
}
@media only screen and (max-width: 1500px) and (min-width: 300px)
    {
        .table
        {
            margin-left: 3vh;
            margin-right: 5vh;
        }
    }
</style>