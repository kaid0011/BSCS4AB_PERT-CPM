<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPM:Input Tasks</title>
</head>

<body>
    <h1>CPM</h1>
    <p>Note: Put - if no prerequisite task/first task. Only one prerequisite.</p>
    <div>
        <b>Task ID</b>
        -
        <b>Task Name</b>
        -
        <b>Task Time</b>
        -
        <b>Prerequisite</b>
    </div>

    <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
        <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
        <?php
        for ($i = 1; $i <= $proj_len; $i++) {
        ?>
            <div>
                <input type="text" name="task_id_<?php echo $i; ?>" value="<?php echo $i; ?>" readonly>
                -
                <input type="text" name="task_name_<?php echo $i; ?>">
                -
                <input type="number" name="task_time_<?php echo $i; ?>">
                -
                <input type="text" name="task_prereq_<?php echo $i; ?>">
            </div>
        <?php }
        ?>
        <button>OK</button>
    </form>
</body>

</html>