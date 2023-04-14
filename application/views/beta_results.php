<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta Results</title>
</head>

<body>
    <a href="<?=base_url('Home')?>">Back to home</a>
    <h1>Beta</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Optimistic</th>
            <th>Most Likely</th>
            <th>Pessimistic</th>
            <th>Duration</th>
            <th>Prereq</th>
            <th>ES</th>
            <th>EF</th>
            <th>LS</th>
            <th>LF</th>
            <th>Slack</th>
            <th>isCritical</th>
        </tr>
        <?php
        foreach ($project as $task) {
        ?>
            <tr>
                <td><?php echo $task['id']; ?></td>
                <td><?php echo $task['desc']; ?></td>
                <td><?php echo $task['opt']." ".$task['unit']; ?></td>
                <td><?php echo $task['ml']." ".$task['unit']; ?></td>
                <td><?php echo $task['pes']." ".$task['unit']; ?></td>
                <td><?php echo $task['time']." ".$task['unit']; ?></td>
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
    </table>
    <h4>Critical Path:
        <?php
        $max = max(array_column($cp, 'id'));
        foreach ($cp as $cp) {
            if ($cp['id'] == $max) {
                echo $cp['id'];
            } else {
                echo $cp['id'] . "-";
            }
        }
        ?>
    </h4>
    <h4>Project Completion Time: <?php echo $finish_time; ?></h4>
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
        <input type="submit" value="Export" name="export">
    </form>
</body>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
</html>