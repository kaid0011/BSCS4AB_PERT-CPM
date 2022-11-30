<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPM:Input Tasks</title>
</head>

<body>
    <?php if ($choice == 'CPM') { ?>
        <h1>CPM</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task/first task. No spaces.</p>
        <div>
            <b>Task ID</b>
            -
            <b>Description</b>
            -
            <b>Duration</b>
            -
            <b>Prerequisite/s</b>
        </div>
        <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
            <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
            <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
            <?php
            for ($i = 1; $i <= $proj_len; $i++) {
            ?>
                <div>
                    <input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly>
                    -
                    <input type="text" name="task_desc_<?php echo $i; ?>">
                    -
                    <input type="number" name="task_time_<?php echo $i; ?>">
                    -
                    <input type="text" name="task_prereq_<?php echo $i; ?>">
                </div>
            <?php }
            ?>
            <button>OK</button>
        </form>

    <?php } elseif ($choice == 'PERT') { ?>
        <h1>PERT</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task/first task. No spaces.</p>
        <div>
            <b>Task ID</b>
            -
            <b>Description</b>
            -
            <b>Optimistic</b>
            -
            <b>Most Likely</b>
            -
            <b>Pessimistic</b>
            -
            <b>Prerequisite/s</b>
        </div>
        <form action="<?php echo base_url('pert/calculate') ?>" method="post">
            <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
            <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
            <?php
            for ($i = 1; $i <= $proj_len; $i++) {
            ?>
                <div>
                    <input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly>
                    -
                    <input type="text" name="task_desc_<?php echo $i; ?>">
                    -
                    <input type="number" name="task_opt_<?php echo $i; ?>">
                    -
                    <input type="number" name="task_ml_<?php echo $i; ?>">
                    -
                    <input type="number" name="task_pes_<?php echo $i; ?>">
                    -
                    <input type="text" name="task_prereq_<?php echo $i; ?>">
                </div>
            <?php }
            ?>
            <button>OK</button>
        </form>
    <?php } elseif ($choice == 'Uniform Distribution') { ?>
        <h1>Uniform Distribution</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task/first task. No spaces.</p>
        <div>
            <b>Task ID</b>
            -
            <b>Description</b>
            -
            <b>Min</b>
            -
            <b>Max</b>
            -
            <b>Prerequisite/s</b>
        </div>
        <form action="<?php echo base_url('uniform/calculate') ?>" method="post">
            <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
            <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
            <?php
            for ($i = 1; $i <= $proj_len; $i++) {
            ?>
                <div>
                    <input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly>
                    -
                    <input type="text" name="task_desc_<?php echo $i; ?>">
                    -
                    <input type="number" name="task_min_<?php echo $i; ?>">
                    -
                    <input type="number" name="task_max_<?php echo $i; ?>">
                    -
                    <input type="text" name="task_prereq_<?php echo $i; ?>">
                </div>
            <?php }
            ?>
            <button>OK</button>
        </form>
    <?php } ?>
</body>

</html>