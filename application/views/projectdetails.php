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
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task. No spaces.</p>
        <table>
            <tr>
                <th>Task ID</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Prerequisite Task/s</th>
            </tr>
            <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                        <td><input type="number" name="task_time_<?php echo $i; ?>" min="1" max="20" step="any" required><?php echo $unit; ?></td>
    
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
        </table>
        <button>OK</button>
        </form>
        <!-- ##################################################################################### -->
    <?php } elseif ($choice == 'PERT') { ?>
        <h1>PERT</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task. No spaces.</p>
        <table>
            <tr>
                <th>Task ID</th>
                <th>Description</th>
                <th>Optimistic</th>
                <th>Most Likely</th>
                <th>Pessimistic</th>
                <th>Prerequisite Task/s</th>
            </tr>
            <form action="<?php echo base_url('pert/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                        <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
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
        </table>
        <button>OK</button>
        </form>
        <!-- ##################################################################################### -->
    <?php } elseif ($choice == 'BETA-PERT') { ?>
        <h1>BETA-PERT</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task. No spaces.</p>
        <table>
            <tr>
                <th>Task ID</th>
                <th>Description</th>
                <th>Optimistic</th>
                <th>Most Likely</th>
                <th>Pessimistic</th>
                <th>Prerequisite Task/s</th>
            </tr>
            <form action="<?php echo base_url('betapert/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                        <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
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
        </table>
            <label for="N">Enter number of trials: </label>
            <input type="number" name="N" min="1" max="10000" required><br>
            <button>OK</button>
        </form>
        <!-- ##################################################################################### -->
    <?php } elseif ($choice == 'Normal') { ?>
        <h1>Normal</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task. No spaces.</p>
        <table>
            <tr>
                <th>Task ID</th>
                <th>Description</th>
                <th>Optimistic</th>
                <th>Most Likely</th>
                <th>Pessimistic</th>
                <th>Prerequisite Task/s</th>
            </tr>
            <form action="<?php echo base_url('normal/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                        <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
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
        </table>
            <label for="N">Enter number of trials: </label>
            <input type="number" name="N" min="1" max="10000" required><br>
            <button>OK</button>
        </form>
        <!-- ##################################################################################### -->
    <?php } elseif ($choice == 'Triangular') { ?>
        <h1>Triangular</h1>
        <p>Note: Put Task ID in prerequisite. Put - if no prerequisite task. No spaces.</p>
        <table>
            <tr>
                <th>Task ID</th>
                <th>Description</th>
                <th>Optimistic</th>
                <th>Most Likely</th>
                <th>Pessimistic</th>
                <th>Prerequisite Task/s</th>
            </tr>
            <form action="<?php echo base_url('triangular/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo $choice; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                        <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
                        <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any" min="1" max="20" required><?php echo $unit; ?></td>
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
        </table>
            <label for="N">Enter number of trials: </label>
            <input type="number" name="N" min="1" max="10000" required><br>
            <button>OK</button>
        </form>
    <?php } ?>
</body>

</html>