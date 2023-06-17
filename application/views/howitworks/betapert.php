<main id="main" class="main">

    <div class="pagetitle">
        <h1>How BETA-PERT Distribution Works</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item">How It Works</li>
                <li class="breadcrumb-item active">BETA-PERT Distribution</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">How does WAPS with Simulation's BETA-PERT Distribution calculation works?</h5>
                        <div class="summary">
                            <p class="text-muted small ps-3"><strong>Step 1: </strong>Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                            <p class="text-muted small ps-3"><strong>Step 2: </strong>Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times provided by the user for each activity that are required to complete the activities.</p>
                            <p class="text-muted small ps-3"><strong>Step 3: </strong>Calculates the alpha value (𝛼) of the 3 durations for each activity.</p>
                            <center><img class="mt-1 mb-1" style="height: 50px;" src="<?= base_url('assets/images/howitworks/beta_alpha.png') ?>">
                            </center>
                            <p class="text-muted small ps-3"><strong>Step 4: </strong>Calculates the beta value (𝛽) of the 3 durations for each activity.</p>
                            <center><img class="mt-1 mb-1" style="height: 50px;" src="<?= base_url('assets/images/howitworks/beta_beta.png') ?>">
                            </center>
                            <p class="text-muted small ps-3"><strong>Step 5: </strong>Calculates the mean (𝜇) of the 3 durations for each activity.</p>
                            <center><img class="mt-1 mb-1" style="height: 50px;" src="<?= base_url('assets/images/howitworks/beta_mean.png') ?>">
                            </center>
                            <p class="text-muted small ps-3"><strong>Step 6: </strong>Calculates the standard deviation (𝜎) using the variance for each activity.</p>
                            <center><img class="mt-1 mb-1" style="height: 50px;" src="<?= base_url('assets/images/howitworks/beta_sd.png') ?>">
                            </center>
                            <p class="text-muted small ps-3"><strong>Step 7: </strong>Computes the duration (T) by using the beta.ppf function from scipy.stats to get the percentile rank (or the inverse of the cumulative distribution function) for a given beta distribution.</p>
                            <div class="func ps-4">
                                <div class="title">
                                    <p class="text-muted small ps-3"><i>beta.ppf(q, a, b, loc=0, scale=1)</i></p>
                                </div>
                                <div class="where ps-4">
                                    <p class="text-muted small ps-3">Where:</p>
                                    <div class="func-desc ps-4">
                                        <h6>𝑞 = random()</h6>
                                        <ul>
                                            <li>
                                                <p class="text-muted small ps-3">This is a function randomly selects a value which was set from 0.0 to 1.0. It serves as the cumulative probability at which to evaluate the percent point function.</p>
                                            </li>
                                            <li>
                                                <p class="text-muted small ps-3">This value undergoes the Monte Carlo Simulation to achieve a more accurate result. The number of trials is based on the user's input.</p>
                                            </li>
                                        </ul>
                                        <h6>a = 𝑎</h6>
                                        <ul>
                                            <li>
                                                <p class="text-muted small ps-3">The calculated alpha value (𝛼) of the 3 durations for each activity.</p>
                                            </li>
                                        </ul>
                                        <h6>𝑏 = 𝛽</h6>
                                        <ul>
                                            <li>
                                                <p class="text-muted small ps-3">The calculated beta value (𝛽) of the 3 durations for each activity.</p>
                                            </li>
                                        </ul>
                                        <h6>𝑙𝑜𝑐 = 𝜇</h6>
                                        <ul>
                                            <li>
                                                <p class="text-muted small ps-3">The calculated mean (𝜇) of the 3 durations for each activity.</p>
                                            </li>
                                        </ul>
                                        <h6>𝑠𝑐𝑎𝑙𝑒 = 𝜎</h6>
                                        <ul>
                                            <li>
                                                <p class="text-muted small ps-3">The calculated standard deviation (𝜎) of the 3 durations for each activity.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted small ps-3"><strong>Step 8: </strong>Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                            <p class="text-muted small ps-3"><strong>Step 9: </strong>Performs a Forward Pass.</p>
                            <ol type="a">
                                <li>
                                    <p class="text-muted small ps-3">Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-3">For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-3">Then, calculates the EF by adding the duration of the activity to its ES.</p>
                                </li>
                                <center>
                                    <p class="text-muted ps-3"><i>EF = ES + T</i></p>
                                </center>
                                <li>
                                    <p class="text-muted small ps-3">This process continues until the ES and EF have been calculated for all activities.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-3">Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0.</p>
                                </li>
                            </ol>
                            <p class="text-muted small ps-3"><strong>Step 9: </strong>Performs a Backward Pass.</p>
                            <ol type="a">
                                <li>
                                    <p class="text-muted small ps-3">Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-3">For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT).</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-3">Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network.</p>
                                </li>
                                <center>
                                    <p class="text-muted ps-3"><i>LS = LF - T</i></p>
                                </center>
                                <li>
                                    <p class="text-muted small ps-3">Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-3">Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project.</p>
                                </li>
                            </ol>
                            <p class="text-muted small ps-3"><strong>Step 10: </strong>Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->