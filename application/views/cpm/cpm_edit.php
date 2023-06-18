<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Task Inputs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item">Calculator</li>
                <li class="breadcrumb-item active">CPM</li>
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
                                <p class="text-muted small mb-4">Enter the new details of your project's tasks for the calculator to re-compute.</p>

                                <!-- Default Table -->
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr style="font-size: 15px;">
                                                <th scope="col">Task</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Duration</th>
                                                <th scope="col">Pre-requisite/s</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
                                                <?php
                                                $project = $_SESSION['project'];
                                                foreach ($project as $task) {
                                                    $i = $task['taskid'];
                                                ?>
                                                    <tr>
                                                        <td><input class="form-control text-center border-0 p-1" style="width: 50px; font-size: 15px; font-weight: 600;" type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                                                        <td>
                                                            <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" style="width: 50px; font-size: 15px; font-weight: 600;" type="text" name="task_name_<?php echo $i; ?>" id="task_name_<?php echo $i; ?>" value="<?php echo $task['name']; ?>">
                                                            <input type="number" name="proj_len" value="<?php echo $task['pqty']; ?>" hidden>
                                                            <input type="text" name="unit" value="<?php echo $task['unit']; ?>" hidden>
                                                            <input type="text" name="ProjectID" value="<?php echo $task['ProjectID']; ?>" hidden>
                                                            <input type="text" name="RecordID_<?php echo $i; ?>" value="<?php echo $task['RecordID']; ?>" hidden>
                                                        </td>
                                                        <td><input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_desc_<?php echo $i; ?>" id="task_desc_<?php echo $i; ?>" value="<?php echo $task['desc']; ?>"></td>
                                                        <td><input class="form-control text-center p-1" style="width: 100px; font-size: 13px;" type="number" name="task_time_<?php echo $i; ?>" id="task_time_<?php echo $i; ?>" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" value="<?php echo $task['time']; ?>" required style="margin-right: 2px;"><span style="font-size: 11px;"><?php echo $_SESSION['unit'] ?></span></td>
                                                        <td><?php
                                                            if ($i == 1) {
                                                            ?>
                                                                <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" value="-" readonly>
                                                                <?php
                                                            } else {
                                                                $x = $i - 1;
                                                                if ($i <= 10) {
                                                                ?>
                                                                    <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" pattern="[1-<?php echo $x; ?>](;[1-<?php echo $x; ?>])*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" value="<?php echo $task['prereq']; ?>" required>
                                                                <?php
                                                                } else if ($i > 10) {
                                                                    $y = $i - 11;
                                                                ?>
                                                                    <input class="form-control text-center p-1" style="width: 150px; font-size: 13px;" type="text" name="task_prereq_<?php echo $i; ?>" id="task_prereq_<?php echo $i; ?>" pattern="([1-9]|1[0-<?php echo $y; ?>])(;([1-9]|1[0-<?php echo $y; ?>]))*|^[\-]" oninvalid="this.setCustomValidity('Enter Valid Activity ID')" onchange="this.setCustomValidity('')" value="<?php echo $task['prereq']; ?>" required>
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
                                <div class="generate d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Re-calculate</button>
                                    <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Enter Project Details -->

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
                                <p class="text-muted small mb-0">Enter the estimated duration of the task. Minimum of 1; Maximum of 100</p>
                            </li>
                            <li>
                                <p class="text-muted small mb-0">Enter the pre-requisite/s of the task</p>
                                <p class="text-muted small">Separate task numbers with semi-colons (;), and enter - if none.</p>
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
                $('[input]').val('');
                history.go(-1);
            }
            return false;
        }
    </script>