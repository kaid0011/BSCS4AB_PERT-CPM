<div class="ganttchartt">
<div class="grid-container-gantt">
    <div class="title">
        <h2>Gantt Chart</h2>
    </div>
    <div class="gridd-container">
        <div class="gantt">
            <table class="gantt-chart">
                <thead>
                    <tr class="gantt-act">
                        <?php
                        $project = $_SESSION['project']; ?>
                        <th class="first"><?php echo $_SESSION['unit'] ?> </th>
                        <?php
                        for ($col = 1; $col <= $_SESSION['finish_time'] + 1; $col++) {
                            if ($col == ceil($_SESSION['finish_time']) + 1) { ?>
                                <th class="other"></th>
                            <?php } else { ?>
                                <th class="other" style="text-align: right;"><?php echo "$col"; ?></th>
                        <?php }
                        } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($project as $task) { ?>
                        <tr>
                            <td><strong><?php echo "Activity " . $task['taskid']; ?></strong></td>
                            <td colspan="<?php echo ceil($_SESSION['finish_time']); ?>">
                                <?php
                                $waiting = ($task['es'] / $_SESSION['finish_time']) * 100;
                                $progress = (($task['ef'] - $task['es']) / $_SESSION['finish_time']) * 100;
                                $slack = (($task['lf'] - $task['ef']) / $_SESSION['finish_time']) * 100;
                                $total_time = $_SESSION['finish_time'] / ceil($_SESSION['finish_time']) * 100;
                                ?>
                                <div style="background-color:#B19090; width: <?php echo $total_time; ?>%">
                                    <div class="waiting" style="position: relative; float: left; display: inline-block; width: <?php echo $waiting ?>%"></div>
                                    <div class="progress" style="position: relative; float: left; display: inline-block; width: <?php echo $progress ?>%"></div>
                                    <?php if ($slack != 0) { ?>
                                        <div class="slack" style="position: relative; float: left; display: inline-block; width: <?php echo $slack ?>%"></div>
                                    <?php } else {
                                    } ?>

                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>