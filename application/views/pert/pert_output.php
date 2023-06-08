<div class="outputpg">
    <!-- <div class="left-button">
        <button onclick="back()"><i class="fa fa-arrow-left"></i></button>
    </div> -->
    <div class="left-button">
        <?php if ($_SESSION['new'] == false) { ?>
            <button type="button" onclick="editData()">Edit Data</button>
        <?php } ?>
    </div>
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Project Evaluation Review Technique (PERT)</h1>
            </div>
            <!-- <div class="paragone">
                <div class="description">
                    <p>PERT uses a probabilistic approach to determine the project's critical path and the probability of
                        completing the project within a specific timeframe.
                        <br>
                        This table shows the project time completion based on the data provided using the PERT Method:
                    </p>
                </div>
            </div> -->
            <div class="dashboard">
                <div class="progress-circle">
                    <div class="steps">
                        <span class="circle active">1</span>
                        <span class="circle active">2</span>
                        <span class="circle active">3</span>
                        <div class="progress-bar">
                            <span class="indicator3"></span>
                        </div>
                    </div>
                </div>
                <div class="progress-label">
                    <div class="steps">
                        <span class="">Project<br>Details</span>
                        <span class="">Input<br>Taks</span>
                        <span class="">Results</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- BASIC MODE -->
        <div class="basic">
            <div class="grid-container">
                <div class="tablecontainer">
                    <table class="results">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th title="Activity Name">Name </th>
                                <th title="Activity Description">Description </th>
                                <th title="Shortest Estimated Activity Duration">Minimum Duration </th>
                                <th title="Maximum Estimated Activity Duration">Maximum Duration </th>
                                <th title="Calculated Activity Completion based on OT, MLT, and PT">Calculated Duration </th>
                                <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                                <th title="">Priority Level </th>
                                <th title="">Type </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $project = $_SESSION['project'];
                            foreach ($project as $task) {
                            ?>
                                <tr>
                                    <td><?php echo $task['taskid']; ?></td>
                                    <td><?php echo $task['name']; ?></td>
                                    <td><?php echo $task['desc']; ?></td>
                                    <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                                    <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                                    <td>
                                        <?php echo number_format((float)$task['time'], 2, '.', '') . " " . $task['unit']; ?>
                                        <input type="number" name="m" id="m_<?php echo $task['taskid']; ?>" value="<?php echo round($task['time'], 2); ?>" hidden>
                                    </td>
                                    <?php if($task['prereq'] == "-1") {
                                        $task['prereq'] = "-";
                                    ?>
                                        <td><?php echo $task['prereq']; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $task['prereq']; ?></td>
                                    <?php } ?>
                                    <td><?php echo $task['priorityLvl']; ?></td>
                                    <td><?php echo $task['type']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- PROFESSIONAL MODE -->
        <div class="professional">
            <div class="grid-container">
                <div class="tablecontainer">
                    <table class="results">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th title="Activity Name">Name </th>
                                <th title="Activity Description">Description </th>
                                <th title="Shortest Estimated Activity Duration">Optimistic </th>
                                <th title="Reasonable Estimated Activity Duration">Most Likely </th>
                                <th title="Maximum Estimated Activity Duration">Pessimistic </th>
                                <th title="Calculated Activity Completion based on OT, MLT, and PT">Calculated Duration </th>
                                <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                                <th title="The calculated Standard Deviation of Each Activity">Standard Deviation </th>
                                <th title="The calculated Variance of Each Activity">Variance </th>
                                <th class="short" title="Activity's Earliest Start Time">ES </th>
                                <th class="short" title="Activity's Earliest Finish Time">EF </th>
                                <th class="short" title="Activity's Latest Start Time">LS </th>
                                <th class="short" title="Activity's Latest Finish Time">LF </th>
                                <th class="short" title="Activity's Available Slack Time">Slack </th>
                                <th title="If the Activity is Critical">Critical </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $project = $_SESSION['project'];
                            foreach ($project as $task) {
                            ?>
                                <tr>
                                    <td><?php echo $task['taskid']; ?></td>
                                    <td><?php echo $task['name']; ?></td>
                                    <td><?php echo $task['desc']; ?></td>
                                    <td><?php echo $task['opt'] . " " . $task['unit']; ?></td>
                                    <td><?php echo $task['ml'] . " " . $task['unit']; ?></td>
                                    <td><?php echo $task['pes'] . " " . $task['unit']; ?></td>
                                    <td>
                                        <?php echo number_format((float)$task['time'], 2, '.', '') . " " . $task['unit']; ?>
                                        <input type="number" name="m" id="m_<?php echo $task['taskid']; ?>" value="<?php echo round($task['time'], 2); ?>" hidden>
                                    </td>
                                    <?php if($task['prereq'] == "-1") {
                                        $task['prereq'] = "-";
                                    ?>
                                        <td><?php echo $task['prereq']; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo $task['prereq']; ?></td>
                                    <?php } ?>
                                    <td>
                                        <?php echo number_format((float)$task['sd'], 2, '.', ''); ?>
                                        <input type="number" name="s" id="s_<?php echo $task['taskid']; ?>" value="<?php echo number_format((float)$task['sd'], 2, '.', ''); ?>" hidden>
                                    </td>
                                    <td><?php echo number_format((float)$task['v'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$task['es'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$task['ef'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$task['ls'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$task['lf'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$task['slack'], 2, '.', ''); ?></td>
                                    <td><?php echo $task['isCritical'] == 1 ? "Yes" : "No"; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <center>
            <p style="margin-top: 0; font-size: 0.8em;">Basic mode <span><label class="switch"><input type="checkbox"><span class="slider round hide-off"></a></span></label></span> Professional mode</p>
        </center>

        <!-- CARDS 1 -->
        <div class="container">
            <div class="box">
                <center>
                    <h4>Critical Path</h4>
                    <p>
                        <?php
                        $cp = $_SESSION['cp'];
                        $max = max(array_column($cp, 'taskid'));
                        foreach ($cp as $cp) {
                            if ($cp['taskid'] == $max) {
                                echo $cp['taskid'] . " " . $_SESSION['unit'];
                            } else {
                                echo $cp['taskid'] . " " . $_SESSION['unit'] . " → ";
                            }
                        }
                        ?>
                    </p>
                </center>
            </div>

            <div class="box">
                <center>
                    <h4>Project Completion Time</h4>
                    <p>
                        <?php echo number_format((float)$_SESSION['finish_time'], 2, '.', '') . " " . $_SESSION['unit']; ?>
                    </p>
                </center>
            </div>
        </div>

        <!-- Gantt Chart -->
        <?php $this->view('ganttchart'); ?>
        <!-- PERT Chart -->
        <?php $this->view('pertchart'); ?>

        <div class="probability">
            <div class="title">
                <h2> Completion Probability Calculator</h2>
            </div>

            <!-- EXPLANATION -->
            <div class="paragone">
                <div class="description">
                    <p>
                        Our PERT Calculator also enables users to determine the probability of an expected duration
                    </p>
                </div>
            </div>
            <!-- CARDS 2 -->

            <div class="container">
                <div class="box">
                    <center>
                        <h4>Compute Project Completion Probability</h4>
                        <h5>How To?</h5>
                        <ul>
                            <li>
                                <p>Enter your expected project duration.</p>
                            </li>
                            <li>
                                <p>Click 'Calculate' and wait for the probability to show.</p>
                            </li>
                        </ul>
                        <h5>Expected Project Duration</h5>
                        <input type="number" name="x" id="x" required>
                        <input type="number" name="m" id="m" value="<?php echo number_format((float)$_SESSION['finish_time'], 2, '.', ''); ?>" hidden>
                        <input type="number" name="s" id="s" value="<?php echo number_format((float)$_SESSION['proj_sd'], 2, '.', ''); ?>" hidden>
                        <br>
                        <button id="compute" class="compute">Calculate</button>
                        <h5>Probability of Completion</h5>
                        <input type="textp" name="p" id="p" readonly>
                    </center>
                </div>

                <div class="box">
                    <center>
                        <h4>Compute Individual Activity Completion Probability</h4>
                        <h5>How To?</h5>
                        <ul>
                            <li>
                                <p>Enter the Activity Number of the duration you want to compute.</p>
                            </li>
                            <li>
                                <p>Enter your expected activity duration.</p>
                            </li>
                            <li>
                                <p>Click 'Calculate' and wait for the probability to show.</p>
                            </li>
                        </ul>
                        <h5>Activity ID:</h5>
                        <input type="number" name="tid" id="tid">
                        <h5>Expected Activity Duration: </h5>
                        <input type="number" name="x_indiv" id="x_indiv"><br>
                        <button id="compute_indiv" class="compute_indiv">Calculate</button>
                        <h5>Probability of Completion</h5>
                        <input type="textp" name="p_indiv" id="p_indiv" readonly>
                    </center>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="box">
                <center>
                    <div class="export">
                        <!-- Export Results Excel File -->
                        <form action="<?php echo base_url('export/results') ?>" method="post">
                            <?php
                            $len = count($project);
                            foreach ($project as $task) {
                            ?>
                                <input type="hidden" name="<?php echo $task['taskid']; ?>" value="<?php echo $task['taskid']; ?>">
                                <input type="hidden" name="desc_<?php echo $task['taskid']; ?>" value="<?php echo $task['desc']; ?>">
                                <input type="hidden" name="opt_<?php echo $task['taskid']; ?>" value="<?php echo $task['opt']; ?>">
                                <input type="hidden" name="ml_<?php echo $task['taskid']; ?>" value="<?php echo $task['ml']; ?>">
                                <input type="hidden" name="pes_<?php echo $task['taskid']; ?>" value="<?php echo $task['pes']; ?>">
                                <input type="hidden" name="time_<?php echo $task['taskid']; ?>" value="<?php echo $task['time']; ?>">
                                <input type="hidden" name="pre_<?php echo $task['taskid']; ?>" value="<?php echo $task['prereq']; ?>">
                                <input type="hidden" name="es_<?php echo $task['taskid']; ?>" value="<?php echo $task['es'];; ?>">
                                <input type="hidden" name="ef_<?php echo $task['taskid']; ?>" value="<?php echo $task['ef']; ?>">
                                <input type="hidden" name="ls_<?php echo $task['taskid']; ?>" value="<?php echo $task['ls']; ?>">
                                <input type="hidden" name="lf_<?php echo $task['taskid']; ?>" value="<?php echo $task['lf']; ?>">
                                <input type="hidden" name="slack_<?php echo $task['taskid']; ?>" value="<?php echo $task['slack']; ?>">
                                <input type="hidden" name="ic_<?php echo $task['taskid']; ?>" value="<?php echo $task['isCritical']; ?>">
                            <?php } ?>
                            <input type="hidden" name="len" value="<?php echo $len; ?>">
                            <h4>Export the Results</h4>
                            <p>Click the "Export Results" button to download an Excel File containing the table of results for your project.</p>
                            <button class="expbtn">Export Results</button>
                        </form>
                    </div>
                    <h6 class="or"> OR </h6>
                    <h4>Calculate a New Project</h4>
                    <p>You can always try something new. Remember to get access of your current calculation to access it again.</p>
                    <div class="createnew">
                        <?php if ($_SESSION['new'] == 'true') { ?>
                            <button type="button" onclick="createNew()">Calculate New Project</button>
                        <?php } ?>
                    </div>
                </center>
            </div>

            <div class="box">
                <center>
                <div class="getaccess">
                        <h4>Get Access Now</h4>
                        <p>You need to enter your e-mail in order to get access for your project. Use your e-mail and the project's reference No. to access it again next time.</p>
                        <?php if ($_SESSION['new'] == 'true') { ?>
                            <div class="form-group">
                                <h5>
                                    <label for="UserEmail">Email: </label>
                                </h5>
                                <input type="email" name="UserEmail" id="UserEmail" autocomplete="off">
                            </div>
                        <?php } ?>
                            <br>
                            <div class="form-group">
                                <h5>
                                    <label>Reference No.</label>
                                </h5>
                                <input type="textp" class="EnterRef" name="ReferenceNo" id="ReferenceNo" value="<?php echo $_SESSION['ReferenceNo']; ?>" readonly>
                            </div>
                        <?php if ($_SESSION['new'] == 'true') { ?>
                            <button type="button" onclick="addEmail()">Get Access</button>
                        <?php } ?>
                    </div>
                </center>
            </div>
        </div>

        <section class="collapsible">
            <input type="checkbox" name="collapse" id="handle1" checked="checked">
            <h2 class="handle">
                <label for="handle1">How WAPS' Project Evaluation Review Technique (PERT) Works:</label>
            </h2>
            <div class="content">
                <div class="pert">
                    <p><strong>Step 1:</strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                    <p><strong>Step 2:</strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times provided by the user for each activity that are required to complete the activities.</p>
                    <p><strong>Step 3:</strong> Calculates the duration (T) by getting the mean of the 3 durations.</p>
                    <img src="<?= base_url('assets/images/howitworks/pert_mean.png') ?>">
                    <p><strong>Step 4:</strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                    <p><strong>Step 5:</strong> Performs a Forward Pass.</p>
                    <ol type="a">
                        <li>
                            <p>Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity.</p>
                        </li>
                        <li>
                            <p>For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0.</p>
                        </li>
                        <li>
                            <p>Then, calculates the EF by adding the duration of the activity to its ES.</p>
                        </li>
                        <center>
                            <p><i>EF = ES + T</i></p>
                        </center>
                        <li>
                            <p>This process continues until the ES and EF have been calculated for all activities.</p>
                        </li>
                        <li>
                            <p>Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0.</p>
                        </li>
                    </ol>
                    <p><strong>Step 6:</strong> Performs a Backward Pass.</p>
                    <ol type="a">
                        <li>
                            <p>Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity.</p>
                        </li>
                        <li>
                            <p>For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT).</p>
                        </li>
                        <li>
                            <p>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network.</p>
                        </li>
                        <center>
                            <p><i>LS = LF - T</i></p>
                        </center>
                        <li>
                            <p>Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path.</p>
                        </li>
                        <li>
                            <p>Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project.</p>
                        </li>
                    </ol>
                    <p><strong>Step 7:</strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        window.location.href = "<?php echo base_url(); ?>pert/editpert";
    }
</script>