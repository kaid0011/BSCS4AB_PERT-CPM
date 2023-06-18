<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Task Inputs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item">Calculator</li>
                <li class="breadcrumb-item active">Normal Distribution</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row" style="">

                    <!-- Project Details -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title pb-0 mb-0 text-uppercase">Update Project Tasks Details</h5>
                                <p class="text-muted small">Step 2 of 2</p>
                                <p class="text-muted small mb-2">Enter the details of your project's tasks for the calculator to compute.</p>
                                <p class="text-muted small mb-1"><strong>Optimistic:</strong> The minimum amount of time required to finish a task, assuming that the progress is faster than the typical expectations.</p>
                                <p class="text-muted small mb-1"><strong>Most Likely:</strong> The expected duration for completing a task, assuming that progress is in accordance with standard expectations.</p>
                                <p class="text-muted small mb-1"><strong>Pessimistic:</strong> The maximum amount of time required to complete a task, assuming everything that could possibly go wrong, actually goes wrong.</p>
                                <p class="text-muted small mb-4"><strong>Pre-requisite/s:</strong> The activity/s that must be completed before the current activity starts.</p>

                                <!-- Default Table -->
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr style="font-size: 15px;">
                                                <th scope="col">Task</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Optimistic</th>
                                                <th scope="col">Most Likely</th>
                                                <th scope="col">Pessimistic</th>
                                                <th scope="col">Pre-requisite/s</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="<?php echo base_url('normal/calculate') ?>" method="post">
                                                <?php
                                                $project = $_SESSION['project'];
                                                foreach ($project as $task) {
                                                    $i = $task['taskid'];
                                                ?>
                                                    <tr>
                                                        <td><input class="form-control text-center border-0 p-1" style="width: 50px; font-size: 15px; font-weight: 600;" type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                                                        <td>
                                                            <input class="form-control text-center p-1" style="font-size: 13px; width: 150px;" type="text" name="task_name_<?php echo $i; ?>" id="task_name_<?php echo $i; ?>" value="<?php echo $task['name']; ?>">
                                                            <input type="number" name="proj_len" value="<?php echo $task['pqty']; ?>" hidden>
                                                            <input type="text" name="unit" value="<?php echo $task['unit']; ?>" hidden>
                                                            <input type="text" name="ProjectID" value="<?php echo $task['ProjectID']; ?>" hidden>
                                                            <input type="text" name="RecordID_<?php echo $i; ?>" value="<?php echo $task['RecordID']; ?>" hidden>
                                                        </td>
                                                        <td><input class="form-control text-center p-1" style="font-size: 13px; width: 150px;" type="text" name="task_desc_<?php echo $i; ?>" id="task_desc_<?php echo $i; ?>" value="<?php echo $task['desc']; ?>"></td>
                                                        <td><input class="form-control text-center p-1" style="font-size: 13px; width: 100px;" type="number" name="task_opt_<?php echo $i; ?>" id="task_opt_<?php echo $i; ?>" value="<?php echo $task['opt']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_opt(this)" required style="margin-right: 2px;"><span style="font-size: 11px;"><?php echo $_SESSION['unit'] ?></span></td>
                                                        <td><input class="form-control text-center p-1" style="font-size: 13px; width: 100px;" type="number" name="task_ml_<?php echo $i; ?>" id="task_ml_<?php echo $i; ?>" value="<?php echo $task['ml']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_ml(this)" required style="margin-right: 2px;"><span style="font-size: 11px;"><?php echo $_SESSION['unit'] ?></span></td>
                                                        <td><input class="form-control text-center p-1" style="font-size: 13px; width: 100px;" type="number" name="task_pes_<?php echo $i; ?>" id="task_pes_<?php echo $i; ?>" value="<?php echo $task['pes']; ?>" step="any" min="1" max="100" placeholder="Max. 100" onchange="check_pes(this)" required style="margin-right: 2px;"><span style="font-size: 11px;"><?php echo $_SESSION['unit'] ?></span></td>
                                                        <td><?php
                                                            if ($i == 1) {
                                                            ?>
                                                                <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="-" readonly>
                                                                <?php
                                                            } else {
                                                                $x = $i - 1;
                                                                if ($i <= 10) {
                                                                ?>
                                                                    <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="<?php echo $task['prereq']; ?>" pattern="[1-<?php echo $x; ?>](;[1-<?php echo $x; ?>])*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
                                                                <?php
                                                                } else if ($i > 10) {
                                                                    $y = $i - 11;
                                                                ?>
                                                                    <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="<?php echo $task['prereq']; ?>" pattern="([1-9]|1[0-<?php echo $y; ?>])(;([1-9]|1[0-<?php echo $y; ?>]))*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" required>
                                                            <?php }
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Default Table Example -->

                                <!-- Trials -->
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="mt-3 text-uppercase" style="font-size: 16px; font-weight: 600;">Number of Trials:</h6>
                                        <input class="form-control" style="font-size: 13px;" type="numbers" name="N" min="1" max="1000" oninput="validity.valid||(value='');" placeholder="Max. 1000" required>
                                    </div>
                                    <div class="col-6 mt-3 d-flex justify-content-end">
                                        <button type="submit" class="h-75 btn btn-primary">Calculate</button>
                                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Enter Project Details -->
                    </form>
                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Steps -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">STEPS</h5>
                        <p class="text-muted small">For each task,</p>
                        <ol type="1">
                            <li>
                                <p class="text-muted small">Enter task name.</p>
                            </li>
                            <li>
                                <p class="text-muted small">Enter task description.</p>
                            </li>
                            <li>
                                <p class="text-muted small mb-0">Enter the estimated durations of the task: Optimistic, Most Likely, and Pessimistic. </p>
                                <p class="text-muted small">Minimum of 1; Maximum of 100</p>
                            </li>
                            <li>
                                <p class="text-muted small mb-0">Enter the pre-requisite/s of the task</p>
                                <p class="text-muted small">Separate task numbers with semi-colons (;), and enter - if none.</p>
                            </li>
                            <li>
                                <p class="text-muted small">Enter the number of trials you want for the Monte Carlo Simulation to perform.</p>
                            </li>
                            <li>
                                <p class="text-muted small">Click 'Calculate' to calculate project and proceed to Results.</p>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End Steps -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main>
<!-- End #main -->

<script>
    function back() {
        if (confirm("Are you sure you want to go back? Your task inputs will be lost.")) {
            history.go(-1);
        }
        return false;
    }
</script>
<script>
    $(document).ready(function() {
        var d = $("#d").val();
        if (d == 'demo1') {
            demo1();
        } else if (d == 'demo2') {
            demo2();
        } else if (d == 'demo3') {
            demo3();
        }
    });

    function check_opt(opt) {
        var opt = opt;
        if (!opt.validity.valid) {
            opt.value = "";
        }
    }

    function check_ml(ml) {
        var ml = ml;
        var ml_id = ml.id;
        ml_id = ml_id.substr(8);
        if (!ml.validity.valid) {
            ml.value = "";
        } else {
            var optv = document.getElementById("task_opt_" + ml_id).value;
            var mlv = Number(ml.value);
            optv = Number(optv);
            if (mlv < optv) {
                alert('Most Likely should be equal to or greater than Optimistic.');
                ml.value = "";
            }
        }
    }

    function check_pes(pes) {
        var pes = pes;
        var pes_id = pes.id;
        pes_id = pes_id.substr(9);
        if (!pes.validity.valid) {
            pes.value = "";
        } else {
            var mlv = document.getElementById("task_ml_" + pes_id).value;
            var pesv = Number(pes.value);
            mlv = Number(mlv);
            if (pesv < mlv) {
                alert('Pessimistic should be equal to or greater than Most Likely and Optimistic.');
                pes.value = "";
            }
        }
    }

    function demo1() {
        console.log('demo 1');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "3";
        document.getElementById('task_ml_1').value = "5";
        document.getElementById('task_pes_1').value = "7";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "4";
        document.getElementById('task_ml_2').value = "6";
        document.getElementById('task_pes_2').value = "9";
        document.getElementById('task_prereq_2').value = "1";

        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "2";
        document.getElementById('task_ml_3').value = "3";
        document.getElementById('task_pes_3').value = "6";
        document.getElementById('task_prereq_3').value = "2";

        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "7";
        document.getElementById('task_ml_4').value = "10";
        document.getElementById('task_pes_4').value = "15";
        document.getElementById('task_prereq_4').value = "-";

        document.getElementById('task_desc_5').value = "E";
        document.getElementById('task_opt_5').value = "9";
        document.getElementById('task_ml_5').value = "12";
        document.getElementById('task_pes_5').value = "19";
        document.getElementById('task_prereq_5').value = "1";

        document.getElementById('task_desc_6').value = "F";
        document.getElementById('task_opt_6').value = "2";
        document.getElementById('task_ml_6').value = "6";
        document.getElementById('task_pes_6').value = "13";
        document.getElementById('task_prereq_6').value = "2";

        document.getElementById('task_desc_7').value = "G";
        document.getElementById('task_opt_7').value = "6";
        document.getElementById('task_ml_7').value = "9";
        document.getElementById('task_pes_7').value = "13";
        document.getElementById('task_prereq_7').value = "3";

        document.getElementById('task_desc_8').value = "H";
        document.getElementById('task_opt_8').value = "4";
        document.getElementById('task_ml_8').value = "7";
        document.getElementById('task_pes_8').value = "12";
        document.getElementById('task_prereq_8').value = "4";

        document.getElementById('task_desc_9').value = "I";
        document.getElementById('task_opt_9').value = "5";
        document.getElementById('task_ml_9').value = "9";
        document.getElementById('task_pes_9').value = "18";
        document.getElementById('task_prereq_9').value = "5";

        document.getElementById('task_desc_10').value = "J";
        document.getElementById('task_opt_10').value = "2";
        document.getElementById('task_ml_10').value = "5";
        document.getElementById('task_pes_10').value = "9";
        document.getElementById('task_prereq_10').value = "5";

        document.getElementById('task_desc_11').value = "K";
        document.getElementById('task_opt_11').value = "1";
        document.getElementById('task_ml_11').value = "3";
        document.getElementById('task_pes_11').value = "6";
        document.getElementById('task_prereq_11').value = "6";

        document.getElementById('task_desc_12').value = "L";
        document.getElementById('task_opt_12').value = "7";
        document.getElementById('task_ml_12').value = "9";
        document.getElementById('task_pes_12').value = "12";
        document.getElementById('task_prereq_12').value = "7";

        document.getElementById('task_desc_13').value = "M";
        document.getElementById('task_opt_13').value = "10";
        document.getElementById('task_ml_13').value = "15";
        document.getElementById('task_pes_13').value = "17";
        document.getElementById('task_prereq_13').value = "10";

        document.getElementById('task_desc_14').value = "N";
        document.getElementById('task_opt_14').value = "14";
        document.getElementById('task_ml_14').value = "19";
        document.getElementById('task_pes_14').value = "22";
        document.getElementById('task_prereq_14').value = "12";

        document.getElementById('task_desc_15').value = "O";
        document.getElementById('task_opt_15').value = "4";
        document.getElementById('task_ml_15').value = "9";
        document.getElementById('task_pes_15').value = "14";
        document.getElementById('task_prereq_15').value = "14";
    }

    function demo2() {
        console.log('demo 2');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "2";
        document.getElementById('task_ml_1').value = "4";
        document.getElementById('task_pes_1').value = "5";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "1";
        document.getElementById('task_ml_2').value = "2";
        document.getElementById('task_pes_2').value = "4";
        document.getElementById('task_prereq_2').value = "1";

        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "1";
        document.getElementById('task_ml_3').value = "3";
        document.getElementById('task_pes_3').value = "4";
        document.getElementById('task_prereq_3').value = "1,2";

        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "1";
        document.getElementById('task_ml_4').value = "2";
        document.getElementById('task_pes_4').value = "4";
        document.getElementById('task_prereq_4').value = "1,2,3";
    }

    function demo3() {
        console.log('demo 3');
        document.getElementById('task_desc_1').value = "A";
        document.getElementById('task_opt_1').value = "1";
        document.getElementById('task_ml_1').value = "3";
        document.getElementById('task_pes_1').value = "5";
        document.getElementById('task_prereq_1').value = "-";

        document.getElementById('task_desc_2').value = "B";
        document.getElementById('task_opt_2').value = "1";
        document.getElementById('task_ml_2').value = "4";
        document.getElementById('task_pes_2').value = "5";
        document.getElementById('task_prereq_2').value = "-";

        document.getElementById('task_desc_3').value = "C";
        document.getElementById('task_opt_3').value = "1";
        document.getElementById('task_ml_3').value = "2";
        document.getElementById('task_pes_3').value = "5";
        document.getElementById('task_prereq_3').value = "2";

        document.getElementById('task_desc_4').value = "D";
        document.getElementById('task_opt_4').value = "3";
        document.getElementById('task_ml_4').value = "4";
        document.getElementById('task_pes_4').value = "5";
        document.getElementById('task_prereq_4').value = "1";
    }
</script>