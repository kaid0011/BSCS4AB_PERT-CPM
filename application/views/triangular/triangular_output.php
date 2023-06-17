<main id="main" class="main">

    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Project Calculation Results</h1>
            <span>
                <?php if ($_SESSION['new'] == false) { ?>
                    <button type="button" class="btn btn-primary ms-3" onclick="editData()">Edit Data</button>
                <?php } ?>
            </span>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item">Calculator</li>
                <li class="breadcrumb-item active">Triangular Distribution</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Project Details -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="card-title pb-0 text-uppercase">Project Name</h5>
                                <p><?php echo $_SESSION['ProjectName']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title pb-0 text-uppercase">Project Description</h5>
                                <p><?php echo $_SESSION['ProjectDesc']; ?></p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title pb-0 text-uppercase">Computation Method</h5>
                                <p><?php echo $_SESSION['CompType']; ?></p>
                            </div>
                        </div>

                        <!-- Results Table -->
                        <div class="table-responsive">
                            <table class="table text-center mt-3 table-striped">
                                <thead class="border-top text-uppercase">
                                    <tr>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Activity</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Name</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Description</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Minimum Duration</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Maximum Duration</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Calculated Duration</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Pre-Requisites</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Priority Level</h6>
                                        </th>
                                        <th scope="col">
                                            <h6 style="font-size: 13px; font-weight:600; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;">Type</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $project = $_SESSION['project'];
                                    foreach ($project as $task) {
                                    ?>
                                        <tr>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['taskid']; ?></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['name']; ?></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['desc']; ?></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['opt']; ?></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['pes']; ?></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['time'] . " " . $task['unit']; ?></p>
                                            </td>
                                            <?php if ($task['prereq'] == "-1") {
                                                $task['prereq'] = "-";
                                            ?>
                                                <td>
                                                    <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['prereq']; ?></p>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['prereq']; ?></p>
                                                </td>
                                            <?php } ?>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['priorityLvl']; ?></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 13px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 0;"><?php echo $task['type']; ?></p>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Results Table -->
                    </div>
                </div>
            </div>
            <!-- Enter Project Details -->

        </div>

        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Project Completion Time -->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title pb-2 text-uppercase text-center">Project Completion Time</h5>
                                <p class="text-center"><?php echo number_format((float)$_SESSION['finish_time'], 2, '.', '') . " " . $_SESSION['unit']; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Project Completion Time -->

                    <!-- Critical Path -->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title pb-2 text-uppercase text-center">Critical Path</h5>
                                <p class="text-center">
                                    <?php
                                    $cp = $_SESSION['cp'];
                                    $max = max(array_column($cp, 'taskid'));
                                    foreach ($cp as $cp) {
                                        if ($cp['taskid'] == $max) {
                                            echo "Task " . $cp['taskid'];
                                        } else {
                                            echo "Task " . $cp['taskid'] . " → ";
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Critical Path -->

                    <!-- Gantt Chart -->
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title pb-2 text-uppercase">Gantt Chart</h5>
                                <?php $this->view('ganttchart'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Gantt Chart -->

                    <!-- PERT Chart -->
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title pb-2 text-uppercase">PERT Chart</h5>
                                <?php $this->view('pertchart'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- End PERT Chart -->

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Export Results -->
                <div class="card">
                    <div class="card-body">
                        <!-- Export Results Excel File -->
                        <form action="<?php echo base_url('export/result') ?>" method="post">
                            <?php
                            $len = count($project);
                            foreach ($project as $task) {
                            ?>
                                <input type="hidden" name="<?php echo $task['taskid']; ?>" value="<?php echo $task['taskid']; ?>">
                                <input type="hidden" name="desc_<?php echo $task['taskid']; ?>" value="<?php echo $task['desc']; ?>">
                                <input type="hidden" name="time_<?php echo $task['taskid']; ?>" value="<?php echo $task['time']; ?>">
                                <input type="hidden" name="pre_<?php echo $task['taskid']; ?>" value="<?php echo $task['prereq']; ?>">
                                <input type="hidden" name="es_<?php echo $task['taskid']; ?>" value="<?php echo $task['es']; ?>">
                                <input type="hidden" name="ef_<?php echo $task['taskid']; ?>" value="<?php echo $task['ef']; ?>">
                                <input type="hidden" name="ls_<?php echo $task['taskid']; ?>" value="<?php echo $task['ls']; ?>">
                                <input type="hidden" name="lf_<?php echo $task['taskid']; ?>" value="<?php echo $task['lf']; ?>">
                                <input type="hidden" name="slack_<?php echo $task['taskid']; ?>" value="<?php echo $task['slack']; ?>">
                                <input type="hidden" name="ic_<?php echo $task['taskid']; ?>" value="<?php echo $task['isCritical']; ?>">
                            <?php } ?>
                            <input type="hidden" name="len" value="<?php echo $len; ?>">
                            <h5 class="card-title pb-2 text-uppercase text-center">Export Results</h5>
                            <p class="text-muted small ps-1 pe-3 text-center">Click the "Export" button to download an Excel File containing the table of results for your project.</p>
                            <div class="generate d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary expbtn">Export</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Export Results -->

                <!-- Calculate New -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('export/result') ?>" method="post">
                            <?php
                            $len = count($project);
                            foreach ($project as $task) {
                            ?>
                                <input type="hidden" name="<?php echo $task['taskid']; ?>" value="<?php echo $task['taskid']; ?>">
                                <input type="hidden" name="desc_<?php echo $task['taskid']; ?>" value="<?php echo $task['desc']; ?>">
                                <input type="hidden" name="time_<?php echo $task['taskid']; ?>" value="<?php echo $task['time']; ?>">
                                <input type="hidden" name="pre_<?php echo $task['taskid']; ?>" value="<?php echo $task['prereq']; ?>">
                                <input type="hidden" name="es_<?php echo $task['taskid']; ?>" value="<?php echo $task['es']; ?>">
                                <input type="hidden" name="ef_<?php echo $task['taskid']; ?>" value="<?php echo $task['ef']; ?>">
                                <input type="hidden" name="ls_<?php echo $task['taskid']; ?>" value="<?php echo $task['ls']; ?>">
                                <input type="hidden" name="lf_<?php echo $task['taskid']; ?>" value="<?php echo $task['lf']; ?>">
                                <input type="hidden" name="slack_<?php echo $task['taskid']; ?>" value="<?php echo $task['slack']; ?>">
                                <input type="hidden" name="ic_<?php echo $task['taskid']; ?>" value="<?php echo $task['isCritical']; ?>">
                            <?php } ?>
                            <input type="hidden" name="len" value="<?php echo $len; ?>">
                            <h5 class="card-title pb-2 text-uppercase text-center">Calculate New Project</h5>
                            <p class="text-muted small ps-1 pe-3 text-center">You can always try something new. Remember to get access of your current calculation to access it again.</p>
                            <div class="createnew">
                                    <div class="generate d-flex justify-content-center mt-3">
                                        <button class="btn btn-primary" type="button" onclick="createNew()">Calculate New Project</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Calculate New -->

                <!-- Get Access -->
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title pb-2 text-uppercase text-center">Get Access</h5>
                        <p class="text-muted small ps-1 pe-3 text-center">You need to enter your e-mail in order to get access for your project. Use your e-mail and the project's reference No. to access it again next time.</p>
                        <?php if ($_SESSION['new'] == 'true') { ?>
                            <div class="form-group mt-3">
                                <h6 style="font-weight: 600;"><label for="UserEmail">Email: </label></h6>
                                <input type="email" class="form-control" name="UserEmail" id="UserEmail" autocomplete="off" placeholder="Enter a valid email address">
                            </div>
                        <?php } ?>
                        <div class="form-group mt-3">
                            <h6 style="font-weight: 600;"><label>Reference No.</label></h6>
                            <input type="textp" class="EnterRef text-center border-0" name="ReferenceNo" id="ReferenceNo" value="<?php echo $_SESSION['ReferenceNo']; ?>" readonly>
                        </div>
                        <?php if ($_SESSION['new'] == 'true') { ?>
                            <div class="generate d-flex justify-content-center mt-3">
                                <button type="button" onclick="addEmail()" class="btn btn-primary">Get Access</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- End Get Access -->

            </div>
            <!-- End Right side columns -->

        </div>
    </section>

</main>
<!-- End #main -->

<script>
    function back() {
        if (confirm("Are you sure you want to go back?")) {
            history.go(-1);
        }
        return false;
    }
</script>
<script>
    $(".basic").show();
    $(".professional").hide();
    $(document).ready(function() {
        $(".switch input").on("change", function(e) {
            const isOn = e.currentTarget.checked;

            if (isOn) {
                $(".professional").show();
                $(".basic").hide();
            } else {
                $(".basic").show();
                $(".professional").hide();
            }
        });
    });
</script>
<script>
    function addEmail() {
        var Form = new FormData();
        var UserEmail = document.getElementById("UserEmail").value;
        var ReferenceNo = document.getElementById("ReferenceNo").value;

        Form.append("UserEmail", UserEmail);
        Form.append("ReferenceNo", ReferenceNo);

        $.ajax({
            url: "<?php echo base_url(); ?>projectdetails/addEmail",
            method: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: Form,
            success: function(data) {
                alert("Email added successfully");
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function createNew() {
        if (confirm("Are you sure you want to create a new project?")) {
            window.location.href = "<?php echo base_url(); ?>projectdetails";
        }
        return false;
    }

    function editData() {
        window.location.href = "<?php echo base_url(); ?>triangular/edittriangular";
    }
</script>