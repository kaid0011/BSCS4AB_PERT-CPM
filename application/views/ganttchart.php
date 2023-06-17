<!-- Gantt Chart -->
<div class="table-responsive">
    <table class="table text-center table-default">
        <thead class="border-top table-secondary">
            <tr>
                <?php
                $project = $_SESSION['project']; ?>
                <th scope="col" class="first" style="font-size: 13px; min-width: 70px;"><?php echo $_SESSION['unit'] ?> </th>
                <?php
                for ($col = 1; $col <= $_SESSION['finish_time'] + 1; $col++) {
                    if ($col == ceil($_SESSION['finish_time'])) { ?>
                        <th scope="col" class="other" style="font-size: 13px;"></th>
                    <?php } else { ?>
                        <th scope="col" class="other text-end" style="font-size: 13px; padding-right: 0; padding-left: 15px;"><?php echo "$col"; ?></th>
                <?php }
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($project as $task) { ?>
                <tr>
                    <td scope="col" style="font-size: 13px; padding-left: 0;"><strong><?php echo "Task " . $task['taskid']; ?></strong></td>
                    <td scope="col" style="font-size: 13px; padding-left: 0;" colspan="<?php echo ceil($_SESSION['finish_time']); ?>">
                        <?php
                        $waiting = ($task['es'] / $_SESSION['finish_time']) * 100;
                        $progress = (($task['ef'] - $task['es']) / $_SESSION['finish_time']) * 100;
                        $slack = (($task['lf'] - $task['ef']) / $_SESSION['finish_time']) * 100;
                        $total_time = $_SESSION['finish_time'] / ceil($_SESSION['finish_time']) * 100;
                        ?>
                        <div style="background-color:#B19090; width: <?php echo $total_time; ?>%">
                            <div class="waiting" style="height: 20px; position: relative; float: left; display: inline-block; width: <?php echo $waiting ?>%"></div>
                            <div class="progress progress-bar progress-bar-striped bg-primary progress-bar-animated" style="border-radius: 0; height: 20px; position: relative; float: left; display: inline-block; width: <?php echo $progress ?>%"></div>
                            <?php if ($slack != 0) { ?>
                                <div class="slack progress-bar bg-info" style="height: 20px; position: relative; float: left; display: inline-block; width: <?php echo $slack ?>%"></div>
                            <?php } else {
                            } ?>

                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- End Gantt Chart -->