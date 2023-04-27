<div class="firstpg">
    <div class="title">
        <b> Project Evaluation Review Technique (PERT)</b>
    </div>
    <div class="paragone">
    PERT uses a probabilistic approach to determine the project's critical path and the probability of 
      completing the project within a specific timeframe.
      <br><br>
      This table shows the project time completion based on the data provided using the PERT Method:
    </div>
</div>
<div class="grid-container">
    <div class="grid-item">
        <table class="responsive-table highlight centered">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Description</th>
                    <th>Optimistic</th>
                    <th>Most Likely</th>
                    <th>Pessimistic</th>
                    <th>Estimated Duration</th>
                    <th>Pre-Requisites</th>
                    <th>Standard Deviation</th>
                    <th>Variance</th>
                    <th>ES</th>
                    <th>EF</th>
                    <th>LS</th>
                    <th>LF</th>
                    <th>Slack</th>
                    <th>Critical</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($project as $task) {
                ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['desc']; ?></td>
                        <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                        <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                        <td>
                            <?php echo round($task['time'], 2) . " " . $task['unit']; ?>
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
        </tbody>
        </table>
    </div>
    <div class="grid-item">

    </div>
</div>

<style>
    .title {
        font-size: 2rem;
        text-align: center;
        margin: 1rem;
    }

    .paragone {
        font-size: 20px;
        font-style: normal;
        text-align: center;
        margin: 2rem 10rem;
    }

    .calculate {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2rem;
    }

    .grid-container {
        display: grid;
        width: 90rem;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .export {
        text-align: right;
    }

    .btn {
        text-decoration: none;
        text-align: right;
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
    .responsive-table {
        margin-top: 3rem;
        margin-bottom: 2rem;
        margin-left: auto;
        margin-right: auto;
        align-items: center;
    }

    tbody,
    thead,
    tr,
    td,
    .responsive-table,
    table {
        border: 2px solid black;
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