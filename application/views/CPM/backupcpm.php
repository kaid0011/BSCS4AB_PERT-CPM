<div class="firstpg">
    <div class="title">
        <b> CRITICAL PATH METHOD </b>
    </div>
    <div class="paragone">
    CPM calculates the earliest and latest start and finish times for each activity, 
      allowing project managers to determine which activities can be delayed without 
      affecting the project's overall duration.
    </div>
    <div class="instructions">
      <p>INSTRUCTIONS:</p>
    <dl>
      <li> DESCRIPTION - Enter the name or description of the activity.</li>
      <li> OPTIMISTIC - Enter the measure of estimated optimistic time.</li>
      <li> PESSIMISTIC - Enter the measure of estimated pessimistic time.</li>
      <li> MOST LIKELY - Enter the measure of estimated most likely time.</li>
      <li> PRE-REQUISITES - Enter the <b>activity number</b> of the required activity.</li>
    </dl>
    </div>
</div>
<div class="container" style="overflow-x:auto;">
      <table class="table">
        <thead>
            <tr>
                <th>Activity</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Pre-Requisites</th>
            </tr>
        </thead>
        <tbody>
            <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo 'cpm'; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                        <td><input type="number" name="task_time_<?php echo $i; ?>" min="1" max="20" step="any" required></td>
                        <td><?php
                            if ($i == 1) {
                            ?>
                                <input type="text" name="task_prereq_<?php echo $i; ?>" value="-" readonly>
                            <?php
                            } else { ?>
                                <input type="text" name="task_prereq_<?php echo $i; ?>" required>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
                ?>
        </tbody>
    </table>
    <div class="calculate">
        <!-- <a class="btn" href="CPMOutput.html">Calculate</a> -->
        <button class="btn">Calculate</button>
    </div>
</div>
</form>

<style>
    .title 
    {
        font-size: 2rem;
        text-align: center;
        margin: 1rem;
    }

    .paragone 
    {
        font-size: 24px;
    font-style: normal;
    text-align: justify;
    margin: 2rem 5rem;
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

    .instructions {
        font-style: normal;
        text-align: justify;
        margin-left: 25rem;
        margin-right: 25rem;
    }

    .instructions p {
        font-size: 20px;
    }

    dl {
        padding-right: 20rem;
        padding-bottom: 5rem;
    }

    .calculate {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2rem;
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

    .btn:hover {
        background-color: #eeee;
        color: #B19090;

    }

    /* TABLE */
    table 
    {
        table-layout: AUTO;
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
        width:auto;
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

    input[type=text1]
    {
        border-style: none;
        text-align: center;
    }

    input
    {
        background-color: transparent;
        border-radius: 10px;
        padding: 5px;
    }

    input[type=numbers]
    {
        width:14rem;
        padding:.5rem;
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