<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERT Results</title>
</head>

<body>
    <a href="<?= base_url('Home') ?>">Back to home</a>
    <h1>PERT</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Optimistic</th>
            <th>Most Likely</th>
            <th>Pessimistic</th>
            <th>Estimate Duration</th>
            <th>SD</th>
            <th>Var</th>
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
                <td>
                    <?php echo round($task['time'], 2)." ".$task['unit']; ?>
                    <input type="number" name="m" id="m_<?php echo $task['id']; ?>" value="<?php echo round($task['time'], 2); ?>" hidden>
                </td>
                <td>
                    <?php echo round($task['sd'], 2); ?>
                    <input type="number" name="s" id="s_<?php echo $task['id']; ?>" value="<?php echo round($task['sd'], 2); ?>" hidden>
                </td>
                <td><?php echo round($task['v'], 2); ?></td>
                <td><?php
                    $pre = implode(",", $task['prereq']);
                    if ($pre == '-1') {
                        $pre = '-';
                    }
                    echo $pre;
                    ?></td>
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
    <h4>Project Variance: <?php echo round($proj_variance, 2); ?></h4>
    <h4>Project Standard Deviation: <?php echo round($proj_sd, 2); ?></h4>

    <!-- Probability of Project Completion by Given Date -->
    <h3>Compute Project Completion Probability</h3>
    <label for="pcg">Enter expected project duration: </label>
    <input type="number" name="x" id="x" required>
    <input type="number" name="m" id="m" value="<?php echo round($finish_time, 2); ?>" hidden>
    <input type="number" name="s" id="s" value="<?php echo round($proj_sd, 2); ?>" hidden>
    <button id="compute" class="compute">Calculate</button>
    <br><label for="p">Probability of completion: </label>
    <input type="text" name="p" id="p" readonly>

    <!-- Probability of Individual Task Completion Completion by Given Date -->
    <h3>Compute Individual Task Completion Probability</h3>
    <label for="id">Enter Task ID: </label>
    <input type="number" name="tid" id="tid">
    <label for="x_indiv">Enter expected task duration: </label>
    <input type="number" name="x_indiv" id="x_indiv">
    <button id="compute_indiv" class="compute_indiv">Calculate</button>
    <br><label for="p">Probability of completion: </label>
    <input type="text" name="p_indiv" id="p_indiv" readonly>
</body>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

</html>

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